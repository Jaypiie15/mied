      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($users as $user)
            <td>{{$user->lastname}}</td>
            <td>{{$user->firstname}}</td>
            <td>{{$user->middlename}}</td>
            <td>{{$user->username}}</td>
            <td>{!! $user->role == '0' ? '<label style="padding:10px;font-weight:bolder" class="label label-danger"> Admin</label>' : '<label style="padding:10px;font-weight:bolder" class="label label-warning"> User</label>' !!} 
            <td>{!! $user->status == 'activated' ? '<label style="padding:10px;font-weight:bolder" class="label label-success"> Activated</label>' : '<label style="padding:10px;font-weight:bolder" class="label label-danger"> Deactivated</label>' !!} 
            <td>
            <a href="{{ route('edit-users', ['id' => Crypt::encrypt($user->id)]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>