      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Country</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($countrys as $country)
            <td>{{$country->country}}</td>
            <td>
            <button value="{{$country->id}}" class="btn btn-primary btn-editcoun"><i class="fa fa-pencil"></i> Edit</button>
            <button value="{{$country->id}}" class="btn btn-danger btn-deletecoun"><i class="fa fa-trash"></i> Delete</button> 
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>