                    <div class="list-group-gallery">
                    @if($meat_cuts->count())
                    @foreach($meat_cuts as $meat_cut)
                    <div class="col-sm-4 col-xs-6 col-md-3 col-lg-3">
                      <a class="thumbnail fancybox" rel="lightbox" href="/mied/{{ $meat_cut->image }}">
                        <img class="img-responsive" alt="" src="/mied/{{$meat_cut->image}}" style="width:300px;height:150px;">
                      <div class="text-left">
                        <small class="text-muted">Kind : {{$meat_cut->kind}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Meat Cut Type : {{$meat_cut->cut_type}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Hs Code : {{$meat_cut->hscode}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">FME Name Number : {{$meat_cut->name_number}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Description : {{$meat_cut->remarks}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Country of Origin : {{$meat_cut->country}}</small>
                      </div>
                      </a>
                      <div class="text-center">                      
                      <a href="{{ route('update-meatcut', ['id'=> Crypt::encrypt($meat_cut->id) ]) }}" class="btn btn-primary btn btn-xs fa fa-pencil"></a>
                      <a href="#" data-toggle="modal" class="btn btn-danger btn btn-xs" data-target="#myModal2{{$meat_cut->id}}"><i class="fa fa-trash"></i></a>

                      </div>
                      @endforeach
                      @endif
