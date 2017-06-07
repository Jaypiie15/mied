      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($faqs as $faq)
            <td>{{$faq->question}}</td>
            <td>{{$faq->answer}}</td>
            <td>
            <button value="{{$faq->id}}" class="btn btn-primary btn-editfaq"><i class="fa fa-pencil"></i> Edit</button>
            <button value="{{$faq->id}}" class="btn btn-danger btn-deletefaq"><i class="fa fa-trash"></i> Delete</button>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>