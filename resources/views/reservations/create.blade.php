@extends('layouts.master')

@section('content')
<div class="card" style="width:100%">
  <div class="card-header" style="background-color:#F9C369;"></div>
  <h6><div class="card-header">RESERVE MARKET</div></h6>
  <div class="card-body">
    <img class="img-fluid" style="width:100%;" src="{{ asset('storage/users/'.$market->created_by.'/markets/'.$market->id.'/'.$layout[0]->path ) }}">

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6" >
        <form id='setData' action="{{ url('/reservations/create/'. $market->id) }}" method="POST">
            @csrf
              <br>
                <h3><label>Zone </label></h3>
                  <select id='zones' class="form-control" name="zones" onchange="setData()">
                    <br>
                      <br>
                        <br>
              <?php
                if(isset($_POST['index'])){
                  for ($i = 0; $i < sizeof($zones); $i++) {
                    if ($i == $_POST['index']){
                      foreach ($zones[$i]->reservations as $value) {
                        if($value->reserved_by == null){
                          echo '<option selected value="' . $zones[$i]->id . '">' . $zones[$i]->name . '</option>';
                          break;
                        }
                      }
                    } else {
                      foreach ($zones[$i]->reservations as $value) {
                        if($value->reserved_by == null){
                          echo '<option value="' . $zones[$i]->id . '">' . $zones[$i]->name . '</option>';
                          break;
                        }
                      }
                    }
                  }
                } else {
                  for ($i = 0; $i < sizeof($zones); $i++) {
                    foreach ($zones[$i]->reservations as $value) {
                      if($value->reserved_by == null){
                        echo '<option value="' . $zones[$i]->id . '">' . $zones[$i]->name . '</option>';
                        break;
                      }
                    }
                  }
                }
               ?>
            </select>
            <input id="index" hidden type="text" name="index" value="">
        </form>

        <?php
          if(isset($_POST['index'])){
            foreach ($zones[$_POST['index']]->reservations as $value) {
              if($value->reserved_by == null){
                echo '<form id="id" class="" action="' . url('/reservations/' . $value->id ) . '" method="post">';
              }
            }
          } else {
            $change = 0;
            for ($i = 0; $i < sizeof($zones); $i++) {
              if($change == 1){
                break;
              }
              foreach ($zones[$i]->reservations as $value) {
                if($value->reserved_by == null){
                  echo '<form id="id" class="" action="' . url('/reservations/' . $value->id ) . '" method="post">';
                  $change = 1;
                  break;
                }
              }
            }

          }
         ?>
          @csrf
          @method('PUT')
          <h3><label>Reservations</label></h3>
          <select id='reservations' class="form-control" name="" onchange="setDataToUpdate()">
            <?php
              if(isset($_POST['index'])){
                foreach ($zones[$_POST['index']]->reservations as $value) {
                  if ($value->reserved_by == null){
                    echo '<option value="' . $value->id . '">' . $value->number . '</option>';
                  }
                }
              } else {
                $has = 0;
                for ($i = 0; $i < sizeof($zones); $i++) {
                  foreach ($zones[$i]->reservations as $value) {
                    if ($value->reserved_by == null){
                      echo '<option value="' . $value->id . '">' . $value->number . '</option>';
                      $has = 1;
                    }
                  }
                  if($has == 1){
                    break;
                  }
                }
              }
             ?>
          </select>
            <br>
          <div>
            <span>Price : <span>
            <?php
              if(isset($_POST['index'])){
                echo $zones[$_POST['index']]->price;
              } else{
                $change = 0;
                for ($i = 0; $i < sizeof($zones); $i++) {
                  if ($change == 1){
                    break;
                  }
                  foreach ($zones[$i]->reservations as $value) {
                    if ($value->reserved_by == null){
                      echo $zones[$i]->price;
                      $change = 1;
                      break;
                    }
                  }
                }
              }
             ?>
          </div>

          <input class="btn btn-primary" type="submit" name="" value="Submit">
        </form>






      </div>
      <div class="col-md-3"></div>

    </div>






  </div>


</div>

@endsection

@push('script')
  <script type="text/javascript">
    function setData(){
      var index = $("#zones").prop('selectedIndex');
      $("#index").attr('value', index);

      $("#setData").submit();
    }

    function setDataToUpdate(){
      var id = $("#reservations").val();
      $('#id').attr('action', '/reservations/'+id);
    }

  </script>
@endpush
