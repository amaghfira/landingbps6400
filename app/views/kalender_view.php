

<!-- style -->
<style>
.center {
    text-align: center;
}
</style>

<!-- jqueyy -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<!-- KALENDER -->
<link href="<?php echo base_url('assets/css/main.css'); ?>" rel="stylesheet"/>
<link rel="stylesheet" href="<?php echo base_url('assets/css/kalender.css');?>">
<script src="<?php echo base_url('assets/js/main.js');?>"></script>
<!-- <script src="<?php echo base_url('assets/js/calendar.js');?>"></script> -->
<script src="<?php echo base_url('assets/js/id.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tooltip.js/1.3.1/umd/tooltip.js" integrity="sha512-SGxwlmQZCsps7xnYk+QgnRwmh5c/90bGz/5TG+a+yFaYwf86KDhj55T7hQFpFGNxXzl0EB93DhTtiKVlOQDHtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>

<!-- XLSX -->
<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/xlsx.full.min.js'); ?>"></script>

<!-- GET DATA FROM DB -->
<?php
    //open connection to mysql db
    $connection = mysqli_connect("localhost","root","","kalender_zoom") or die("Error " . mysqli_error($connection));
    
    //fetch table rows from mysql db
    $sql = "SELECT * from jadwal_zoom";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result)){
        $emparray[] = $row;
    }

    // convert array to string
    $jsondata = json_encode($emparray);

    // close db connn
    mysqli_close($connection);
?>


<script>

    //  get data from php json 
    var ar = <?php echo $jsondata; ?>;
    console.log(ar);


    // KONVERT SHEETS KE JSON
    function getDataFromExcel(cfunction){
        var url = "<?php echo base_url(); ?>assets/jadwalzoom.xlsx";
        var oReq = new XMLHttpRequest();
        oReq.open("GET", url, true);
        oReq.responseType = "arraybuffer";
        
        
        oReq.onload = function(e) {
            var arraybuffer = oReq.response;

            /* convert data to binary string */
            var data = new Uint8Array(arraybuffer);
            var arr = new Array();
            for (var i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
            var bstr = arr.join("");

            /* Call XLSX */
            var workbook = XLSX.read(bstr, {
                type: "binary"
            });

            /* DO SOMETHING WITH workbook HERE */
            var first_sheet_name = workbook.SheetNames[0];
            /* Get worksheet */
            var worksheet = workbook.Sheets[first_sheet_name];
            /* console.log(XLSX.utils.sheet_to_json(worksheet, {
                raw: true
            })); */
            var data = XLSX.utils.sheet_to_json(worksheet, {raw: true}) ;
            
            jsonData = JSON.stringify(data);
        
            // console.log(jsonData);
            function download(content, fileName, contentType) {
                var a = document.createElement("a");
                var file = new Blob([content], {type: contentType});
                a.href = URL.createObjectURL(file);
                a.download = fileName;
                a.click();
            }

            // download(jsonData, '../json.txt', 'text/plain');
            // console.log(data[0]['Tanggal Mulai']);

            cfunction(data);
            
        }
        oReq.send();
    }
    getDataFromExcel(function(data){
        //sing data iki
        console.log(ar);
        console.log(ar.length);
        // Kalender function
    //document.addEventListener('DOMContentLoaded', function() {

        var dataProperties = ar.map(key => {
            if (key.pengguna == 'IPDS') {
                var properties = {
                    "backgroundColor": '#542e71',
                    "borderColor": '#542e71',
                    "start": key.tanggal_mulai + 'T' + key.waktu_mulai,
                    "end": key.tanggal_selesai + 'T' + key.waktu_selesai,
                    "title": key.pengguna + ' [ ' + key.deskripsi + ' ] ',
                    "description": key.deskripsi
                }
                // return properties;
            } else if (key.pengguna == 'Sosial') {
                var properties = {
                    "backgroundColor": '#bf1363',
                    "borderColor": '#bf1363',
                    "start": key.tanggal_mulai + 'T' + key.waktu_mulai,
                    "end": key.tanggal_selesai + 'T' + key.waktu_selesai,
                    "title": key.pengguna + ' [ ' + key.deskripsi + '] ',
                    "description": key.deskripsi
                }
                
            } else if (key.pengguna == 'Produksi') {
                var properties = {
                    "backgroundColor": '#ffc947',
                    "borderColor": '#ffc947',
                    "start": key.tanggal_mulai + 'T' + key.waktu_mulai,
                    "end": key.tanggal_selesai + 'T' + key.waktu_selesai,
                    "title": key.pengguna + ' [ ' + key.deskripsi + ' ] ',
                    "description": key.deskripsi
                }
                
            } else if (key.pengguna == 'Distribusi') {
                var properties = {
                    "backgroundColor": '#39a6a3',
                    "borderColor": '#39a6a3',
                    "start": key.tanggal_mulai + 'T' + key.waktu_mulai,
                    "end": key.tanggal_selesai + 'T' + key.waktu_selesai,
                    "title": key.pengguna + ' [ ' + key.deskripsi + ' ] ',
                    "description": key.deskripsi
                }
                
            } else if (key.pengguna == 'Nerwilis') {
                var properties = {
                    "backgroundColor": '#2940d3',
                    "borderColor": '#2940d3',
                    "start": key.tanggal_mulai + 'T' + key.waktu_mulai,
                    "end": key.tanggal_selesai + 'T' + key.waktu_selesai,
                    "title": key.pengguna + ' [ ' + key.deskripsi + ' ] ',
                    "description": key.deskripsi
                }
                
            } else if (key.pengguna == 'TU') {
                var properties = {
                    "backgroundColor": '#f5e6ca',
                    "borderColor": '#f5e6ca',
                    "start": key.tanggal_mulai + 'T' + key.waktu_mulai,
                    "end": key.tanggal_selesai + 'T' + key.waktu_selesai,
                    "title": key.pengguna + ' [ ' + key.deskripsi + ' ] ',
                    "description": key.deskripsi
                }
                
            } else {
                var properties = {
                    "backgroundColor": '#a799b7',
                    "borderColor": '#a799b7',
                    "start": key.tanggal_mulai + 'T' + key.waktu_mulai,
                    "end": key.tanggal_selesai + 'T' + key.waktu_selesai,
                    "title": key.pengguna + ' [ ' + key.deskripsi + ' ] ',
                    "description": key.deskripsi
                }
                
            } 
            return properties;
        });
        console.log(dataProperties);
        
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id',
            navLinks: true,
            // navLinkDayClick: function(date, jsEvent) {
            //     console.log('day', date.toISOString());
            //     console.log('coords', jsEvent.pageX, jsEvent.pageY);
            // },
            selectable: true,
            // selectMirror: true,
            // dateClick: function(info) {
            //     alert('Date: ' + info.dateStr + '</br>' + 'Deskripsi Meeting' );
            //     // alert('Deskripsi Meeting ');
            // },
            headerToolbar: {
                center: 'dayGridMonth, timeGridWeek'
            },
            views: {
                dayGridMonth: {
                    titleFormat: {year: 'numeric', month: 'long', day: '2-digit'}
                }
            },
            events: dataProperties,
            eventTimeFormat: { // like '14:30:00'
                hour: '2-digit',
                minute: '2-digit',
                meridiem: false,
                hour12: false
            },
            // eventDidMount: function(info) {
            //     tooltip = new Tooltip(info.el, {
            //         title: info['event']['extendedProps']['description'],
            //         placement: 'top',
            //         trigger: 'hover',
            //         container: 'body'
            //     });
            //     // console.log(info.event.extendedProps.description);
            //     console.log(info['event']['extendedProps']['description']);
            // }
            
        });
        // calendar.addEventSource(dataproperties);
        calendar.render();
        // console.log(window.jsonData);
    //});
    });
    
    // var hasil = oReq.responseText;
    // var jsonResponse = JSON.parse(hasil);
    // console.log(jsonResponse['hasil']);
    
    
    // Read Json File 
    // var xmlhttp = new XMLHttpRequest();
    // xmlhttp.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //         myObj = JSON.parse(this.responseText);
    //         console.log(myObj);
    //     }
    // };
    // xmlhttp.open("GET", "dataku.json", true);
    // xmlhttp.send();
    

    

</script>

<style>
    /* #ipds {
        background-color:blue;
        width:10px;
        height:20px;
        float:left;
        
    }

    .items {
        float:left;
        margin-left: 200px;
    } */

</style>


<!-- KALENDER -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css">
<br><br>
<div style="padding-right:200px; float:right; font-family:Arial;">
    <!-- <a href="<?php echo base_url(); ?>req_jadwal">Request Meeting</a> -->
    <!-- <form action="<?php echo base_url(); ?>req_jadwal">
        <input type="submit" value="Request Meeting" />
    </form> -->
    <button class="btn btn-dark" type="submit" onclick="window.location.href='<?php echo base_url(); ?>req_jadwal'">Request Meeting</button>
</div>
<br><br><br>
<div class="center">
    <h2 style="text-align: center; font-family:Arial;">JADWAL ZOOM MEETING BPS KALTIM</h2>
</div>
<div id="cc">
    <div id='calendar'></div>
</div>
<div class="keterangan" style="font-family:Arial;">
    <!-- <div id="ipds"></div><p class="items">IPDS</p>
    <div id="sosial"></div><p class="items">IPDS</p> -->
</div>


