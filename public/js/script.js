// when document ready, show the pie
$(document).ready(function() {
  showPie();
  showPengeluaranPerHari();
  showPemasukanPengeluaranPerBulan();
});

function showPie() {
  {
    $.post("http://localhost/cafinar/analisa/chartpemasukanpengeluaran",
    function (data) {
      let cashflow = data;
      let pemasukan = parseInt(cashflow.pemasukan);
      let pengeluaran = parseInt(cashflow.pengeluaran);
      
      const ctx = $('#piechart');
      let myPieChart = new Chart(ctx, {
        type : 'bar',
        data : {
          labels : ['Pemasukan', 'Pengeluaran'],
          datasets : [{
            label : 'Rp',
            data : [pemasukan, pengeluaran],
            backgroundColor : [
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 99, 132, 0.2)'
            ],
            borderColor : [
              'rgba(54, 162, 235, 1)',
              'rgba(255, 99, 132, 1)'
            ],
            borderWidht : 1
          }]
        },
        options : {
          scales : {
            yAxes : [{
              ticks: {
                beginAtZero : true
              }
            }]
          }
        }
      });
    });
  }
}

function showPengeluaranPerHari() {
  {
    $.post("http://localhost/cafinar/analisa/chartpengeluaranperhari", function(data) {
      let day = [];
      let nominal = [];

      for (let i in data) {
        day.push(data[i].day);
        nominal.push(data[i].nominal);
      }

      let chartdata = {
        labels: day,
        datasets: [{
          label: 'Pengeluaran (Rp)',
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          data: nominal
        }]
      };

      const ctx = $("#chartpengeluaranperhari");
      let chartPengeluaranPerHari = new Chart (ctx, {
        type: 'bar',
        data: chartdata
      });
    });
  }
}

$("#lihatpengeluaranperhari").on('click', function () {
  let explode = $("#bulan").val().split('|');
  
  let bulan = explode[0];
  let namabulan = explode[1];
  let tahun = $("#tahun").val();
  
  $.ajax({
    method: "post",
    url: "http://localhost/cafinar/analisa/chartpengeluaranperharibybulan",
    data: {bulan : bulan, tahun : tahun},
    dataType: "json",
    success: function (data) {
      $("#namabulan").html(namabulan);
      $("#namatahun").html(tahun);

      let day = [];
      let nominal = [];

      for (let i in data) {
        day.push(data[i].day);
        nominal.push(data[i].nominal);
      }

      let chartdata = {
        labels: day,
        datasets: [{
          label: 'Pengeluaran (Rp)',
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          data: nominal
        }]
      };

      const ctx = $("#chartpengeluaranperhari");
      let chartPengeluaranPerHari = new Chart (ctx, {
        type: 'bar',
        data: chartdata
      });
    }
  });
});

function showPemasukanPengeluaranPerBulan() {
  {
    $.post("http://localhost/cafinar/analisa/chartpemasukanpengeluaranperbulan",
    function (data) {
      let month = [];
      let pemasukan = [];
      let pengeluaran = [];

      for (let i in data.pengeluaran) {
        month.push(data.pengeluaran[i].month);
        pengeluaran.push(data.pengeluaran[i].nominal);
      }

      for (let i in data.pemasukan) {
        pemasukan.push(data.pemasukan[i].nominal);
      }

      let chartdata = {
        labels: month,
        datasets: [{
          label: 'Pemasukan (Rp)',
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          data: pemasukan
        }, {
          label: 'Pengeluaran (Rp)',
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          data: pengeluaran
        }]
      };

      const ctx = $("#chartpemasukanpengeluaranperbulan");
      let chartPemasukanPengeluaranPerBulan = new Chart (ctx, {
        type: 'bar',
        data: chartdata,
        options : {
          scales : {
            yAxes : [{
              ticks: {
                beginAtZero : true
              }
            }]
          }
        }
      });
    });
  }
}