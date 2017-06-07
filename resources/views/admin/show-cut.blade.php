      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Meat Cut Type</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($cuts as $cut)
            <td>{{$cut->cut_type}}</td>
            <td>
            <button value="{{$cut->id}}" class="btn btn-primary btn-editcut"><i class="fa fa-pencil"></i> Edit</button>
            <button value="{{$cut->id}}" class="btn btn-danger btn-deletecut"><i class="fa fa-trash"></i> Delete</button> 
          </tr>
          @endforeach
          
        </tbody>
      </table>