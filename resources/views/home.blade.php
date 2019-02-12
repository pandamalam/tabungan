@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


@if(Auth::user()->whereHasNot('keluar') AND Auth::user()->whereHasNot('masuk'))
Anda Belum Mempunyai data Keuangan
@else
<table class="uk-table uk-table-hover uk-table-divider" id="myTable">
    <thead>
        <tr>
            <th>Keterangan</th>
            <th onclick="sortTable(0)">Tanggal</th>
            <th onclick="sortTable(1)">Nominal</th>
        </tr>
    </thead>
    <tbody>
                    @foreach($a as $masuk)
                   <tr class="uk-text-primary">
            <td>{{$masuk -> keterangan}}</td>
            <td>{{$masuk -> tanggal}}</td>
            <td>{{$masuk -> nominal}}</td>
              <td>            <form action="delete/{{$masuk->id}}/uang" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-xs btn-danger" > Delete </button>
        </form></td>
        </tr>
                    @endforeach
                @foreach($b as $keluar)
                   <tr class="uk-text-danger">
            <td>{{$keluar -> keterangan}}</td>
            <td>{{$keluar -> created_at}}</td>
            <td>{{-$keluar -> nominal}}</td>
            <td>            <form action="delete/uang/{{$keluar->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-xs btn-danger" > Delete </button>
        </form></td>

        </tr>
                    @endforeach
                                    </tbody>
            </table>
            <div class="uk-text-center uk-text-large  uk-text-bold">
                <p>Jumlah<br>
{{Auth::user()->masuk->sum('nominal') - Auth::user()->keluar->sum('nominal')}}</p>
</div>
@endif
                
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
@endsection
