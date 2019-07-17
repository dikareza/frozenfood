function Dashboard() {
	$.ajax({
      url: "admin.html",
      success: function(){
        window.location = 'admin.html';
      }
    });
  return false;
}

function Guru() {
	$.ajax({
      url: "guru.html",
      success: function(){
        window.location = 'guru.html';
      }
    });
  return false;
}
function Rangejam() {
  $.ajax({
      url: "rangejam.html",
      success: function(){
        window.location = 'rangejam.html';
      }
    });
  return false;
}

function Kelas() {
  $.ajax({
      url: "kelas.html",
      success: function(){
        window.location = 'kelas.html';
      }
    });
  return false;
}

function Hari() {
  $.ajax({
      url: "hari.html",
      success: function(){
        window.location = 'hari.html';
      }
    });
  return false;
}

function Mapel() {
  $.ajax({
    url: "mapel.html",
    success: function(){
      window.location = "mapel.html";
    }
  });
  return false;
}

function Tugas() {
  $.ajax({
    url: "tugas.html",
    success: function(){
      window.location = "tugas.html";
    }
  });
  return false;
}

function LihatTugas() {
  $.ajax({
    url: "data-tugas-guru.html",
    success: function(){
      window.location = "data-tugas-guru.html";
    }
  });
  return false;
}

function Wali() {
  $.ajax({
    url: "wali-kelas.html",
    success: function(){
      window.location = "wali-kelas.html";
    }
  });
  return false;
}

function Siswa() {
  $.ajax({
    url: "siswa.html",
    success: function(){
      window.location = "siswa.html";
    }
  });
  return false;
}

function Jadwal() {
  $.ajax({
    url: "jadwal.html",
    success: function(){
      window.location = "jadwal.html";
    }
  });
  return false;
}