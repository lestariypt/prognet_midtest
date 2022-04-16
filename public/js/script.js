var button_list_mahasiswa =
    '<a role="button" class="btn btn-primary px-3" href="/mahasiswa/asiap">\
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square me-2" viewBox="0 0 16 16">\
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>\
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>\
</svg>\
Detail\
</a>';
//button hapus
var button_hapus =
    '<a role="button" class="btn btn-danger px-3" href="krs/hapus/asiap">\
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg me-2" viewBox="0 0 16 16">\
<path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>\
<path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>\
</svg>\
Hapus\
</a>';

var listNilai = {
    A: 4,
    B: 3,
    C: 2,
    D: 1,
    E: 0,
};

//ajax pada krs
function tabel_krs(url_ajax, document, semester) {
    let element_html = $(document);
    element_html.load(url_ajax, (response, textStatus) => {
        element_html.empty();
        if (textStatus == "success") {
            let hasil = JSON.parse(response);
            let btn = "";
            var total_sks = 0;
            if (hasil.length > 0) {
                hasil.forEach((element, index) => {
                    if (element.status == "Disetujui") {
                        btn = button_list_mahasiswa.replace(
                            "asiap",
                            "krs/detail/" + element.id
                        );
                    } else {
                        btn = button_hapus.replace("asiap", element.id);
                    }
                    element_html.append(
                        row_str([
                            index + 1,
                            [
                                element.kode,
                                element.nama_mata_kuliah,
                                element.sks,
                                element.status,
                            ],
                        ]).replace(
                            "</tr>",
                            '<td class="text-center">' + btn + "</td></tr>"
                        )
                    );
                    total_sks += element.sks;
                    if (semester == Number(localStorage["semester"])) {
                        localStorage["krs_len"] = total_sks;
                    }
                });
            } else {
                localStorage["krs_len"] = "0";
                element_html.append(
                    '<tr>\
              <td colspan="6" align="center"> Kamu Belum Mengambil KRS di Semester Ini ! </td>\
          </tr>'
                );
            }
            //karena asyncronus jadi harus dipanggil melalui function agar syncronus
            tambah_disable();
            update_data_krs();
        }
    });
}

function tambah_disable() {
    if (localStorage["krs_len"] == localStorage["krs_maks"]) {
        $("#tambah").addClass("disabled");
    }
}

function update_data_krs() {
    $("#maksimal_sks").text(localStorage["krs_maks"]);
    $("#sks").text(localStorage["krs_len"]);
}

//mencari data menggunakan ajax
function ajax_search(document, route, column_size) {
    html_element = $(document);
    html_element.load(route, function (response, textStatus) {
        if (textStatus == "success") {
            let response_json = JSON.parse(response);
            fetch_tabel(response_json, html_element, column_size);
        }
    });
}

//memasukan data ke dalam tabel
function fetch_tabel(data, html_element, column_size) {
    html_element.empty();
    if (data.length == 0) {
        $(html_element).append(
            '<tr><td colspan="size" align="center"> Pencarian Tidak Ditemukan ! </td></tr>'.replace(
                "size",
                column_size
            )
        );
    } else {
        data.forEach((element, index) => {
            $(html_element).append(row_str([index + 1, element]));
        });
    }
}

//generate string untuk fetch row pada tabel
function row_str(arr) {
    let string = '<tr><td class="text-center" scope="row">' + arr[0] + "</td>";
    Object.values(arr[1]).forEach((element) => {
        string += '<td class="text-center">' + element + "</td>";
    });
    string += "</tr>";
    return string;
}

// fungsi untuk mengubah tombol dan menambahkan value ke localStorage
function krs_tambah(id) {
    var krs_cache = JSON.parse(localStorage["krs"]).list;
    var krs_maks = localStorage["krs_maks"];
    var krs_len = parseInt(localStorage["krs_len"]);
    if ($("#" + id).hasClass("btn-success")) {
        if (krs_len + Number($("#sks-" + id).val()) > krs_maks) {
            let alert = $("#alert");
            let close = $("#close");
            let pesan = $("#pesan");
            alert.addClass("alert-warning");
            alert.css({ display: "block" });
            alert.removeClass("hide");
            alert.addClass("show");
            alert.addClass("showAlert");
            pesan.text("Mencapai Batas Maksimal KRS !");
            alert.css({ borderLeft: "7px solid #fcbd00" });
            close.hover(
                function () {
                    close.css({ backgroundColor: "#b7ab86" });
                },
                function () {
                    close.css({ backgroundColor: "transparent" });
                }
            );
        } else {
            $("#" + id)
                .removeClass("btn-success")
                .addClass("btn-danger")
                .text("Hapus");
            krs_cache.push(Number($("#" + id).val()));
            krs_len += Number($("#sks-" + id).val());
            console.log(krs_len);
        }
    } else {
        $("#" + id)
            .removeClass("btn-danger")
            .addClass("btn-success")
            .text("Tambah");
        krs_cache.pop(Number($("#" + id).val()));
        krs_len -= Number($("#sks-" + id).val());
    }
    localStorage["krs"] = JSON.stringify({ list: krs_cache, max: krs_maks });
    localStorage["krs_len"] = krs_len;
}

//fungsi untuk tombol ajukan pada tambah krs
function krs_ajukan() {
    if (typeof localStorage["krs"] !== "undefined") {
        var list = JSON.parse(localStorage["krs"]).list;
        var semester = localStorage["semester"];
        $("#listKrs").attr("value", list.join(","));
        $("#semesterKrs").attr("value", semester);
        localStorage.clear();
    } else {
        alert("Data Masih Kosong Silahkan diisi terlebih dahulu !");
    }
}

function tabel_khs(url_ajax, document) {
    let element_html = $(document);
    element_html.load(url_ajax, (response, textStatus) => {
        element_html.empty();
        if (textStatus == "success") {
            let hasil = JSON.parse(response);
            var total_sks = 0;
            var total_nilai = 0;
            if (hasil.length > 0) {
                let nilai_temp = "&nbsp";
                hasil.forEach((element, index) => {
                    if (element.nilai_angka > -1) {
                        nilai_temp = element.nilai_angka;
                    }
                    element_html.append(
                        row_str([
                            index + 1,
                            [
                                element.kode,
                                element.nama_mata_kuliah,
                                element.nilai,
                                nilai_temp,
                            ],
                        ]).replace(
                            "</tr>",
                            '<td class="text-center">' +
                                button_list_mahasiswa.replace(
                                    "asiap",
                                    "khs/detail/" + element.id
                                ) +
                                "</td></tr>"
                        )
                    );
                    total_sks += element.sks;
                    if (element.nilai != "Tunda") {
                        total_nilai += listNilai[element.nilai] * element.sks;
                    }
                    update_sks_ips(total_nilai, total_sks);
                });
            }
        }
    });
}

function update_sks_ips(total_nilai, total_sks) {
    let nilai = total_nilai / total_sks;
    $("#ips").text(nilai.toFixed(2));
    $("#sks").text(total_sks);
}

//mengubah foto saat upload
function readURL(input) {
    //mengecek apakah ekstensi file sudah benar
    var url = input.value;
    var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
    if (
        input.files &&
        input.files[0] &&
        (ext == "png" || ext == "jpeg" || ext == "jpg")
    ) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#gambar").css(
                "background-image",
                'url("' + e.target.result + '")'
            );
        };
        reader.readAsDataURL(input.files[0]);
    }
}
