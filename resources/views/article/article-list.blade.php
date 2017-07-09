<article>
    @forelse($articles as $article)
        <article class="row panel panel-primary">
            <div class="panel-heading">
                <span class="label label-danger">{{$article->lable}}</span>
                <a class="text-white" href="{{url("/article/$article->id.html")}}">{{$article->title}}</a>
            </div>
            <div class="panel-info text-right">
                <span class="glyphicon glyphicon-time text-info"></span>
                <time class="text-info">{{date('Y-m-d H:i:s',$article->createtime)}}</time>
                <span class="glyphicon glyphicon-user text-info"></span>
                <span>{{$article->writer}}</span>
            </div>
            <div class="panel-body">
                <img src="{{url("/uploads/$article->headimg")}}" alt=""
                     class="img-thumbnail col-md-6 col-sm-6  col-xs-12">
                <div class="col-md-6 col-sm-6  col-xs-12">
                    {{$article->summary}}
                </div>
            </div>
            <div class="panel-info text-right">
                <span class="glyphicon glyphicon-eye-open text-info"></span>
                <span class="text-info">{{$article->borwse}}</span>
                <span class=" glyphicon glyphicon-folder-close text-info"></span>
                <span class="text-info">{{$article->class}}</span>
            </div>
            <div class="panel-info ">
                <span class="glyphicon glyphicon-tag text-info"> 关键词：</span>
                <strong class="text-danger">{{$article->keyword}}</strong>
            </div>
            <div class="panel-footer text-right">
                <a href="{{url("/article/$article->id.html")}}" class="btn btn-info  ">阅读全文</a>
            </div>
        </article>
        @empty
            <div class="well text-center"><p class="text-danger">还没有这类的文章，快去发布吧！</p></div>
    @endforelse
        <div style="margin: 5px auto">
            {{$articles->links('vendor.pagination.default',['articles'=>$articles])}}
        </div>
</article>