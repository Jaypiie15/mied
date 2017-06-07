      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($dots as $dot)
            <td>{{$dot->question}}</td>
            <td>{{$dot->answer}}</td>
            <td>
            <button value="{{$dot->id}}" class="btn btn-primary btn-editdot"><i class="fa fa-pencil"></i> Edit</button>
            <button value="{{$dot->id}}" class="btn btn-danger btn-deletedot"><i class="fa fa-trash"></i> Delete</button>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>