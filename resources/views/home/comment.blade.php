<div class="container pb-5">
    <h1 class="text-center pb-5" style="font-size: 50px; font-weight:bold;">Comments</h1>

    <form action="{{url('/add_comment')}}" method="POST" class="mb-4">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Comment Something Here" required></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Comment">
    </form>
</div>

<div class="container pb-5">
    <h2 class="pb-4" style="font-size: 30px; font-weight:bold; color: #333;">All Comments</h2>

    @foreach ($comment as $comment) 
        <div class="card mb-3" style="padding: 15px;">
            <div class="card-body">
                
                <b>{{$comment->name}}</b>
                <p>{{$comment->comment}}</p>
                <a href="javascript:void(0);" class="text-primary" onclick="reply(this)" data-commentid="{{$comment->id}}">Reply</a>

                    <a href="{{url('/delete_comment', $comment->id)}}" class=" delete-comment"
                    onclick="return confirm('Are You Sure You Want To Delete This Comment')">Delete</a>
                
                @foreach($reply as $rep)
                    @if($comment->id == $rep->comment_id)
                        <div class="reply" style="padding-left: 3%; padding-top: 10px; border-top: 1px solid #ddd; margin-top: 10px;">
                            <b>{{$rep->name}}</b>
                            <p>{{$rep->reply}}</p>
                            <a href="javascript:void(0);" class="text-primary" onclick="reply(this)" data-commentid="{{$comment->id}}">Reply</a>
                            <a href="{{url('/delete_reply', $rep->id)}}" class="delete-comment"
                            onclick="return confirm('Are You Sure You Want To Delete This Reply')">Delete</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach

    {{-- Reply Section --}}
    <div class="reply_div" style="display: none; margin-top: 20px;">
        <form action="{{url('/add_reply')}}" method="POST"> 
            @csrf
            <input type="text" id="commentId" name="commentId" hidden>
            <div class="form-group">
                <textarea class="form-control" name="reply" id="reply" rows="3" placeholder="Write Something Here" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Reply</button>
            <a href="javascript:void(0);" class="btn btn-danger" onclick="reply_close(this)">Close</a>
        </form>
    </div>
</div>
    
<!-- Custom CSS -->
<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .form-control {
        border-radius: 5px;
        box-shadow: none;
        border: 1px solid #ddd;
    }

    .form-control:focus {
        border-color: #f7444e;
        box-shadow: 0 0 5px rgba(244, 68, 78, 0.5);
    }

    .text-primary {
        cursor: pointer;
        transition: color 0.3s;
    }

    .text-primary:hover {
        color: #f7444e;
    }

    .delete-comment {
        color: #f7444e;
  
    }
    
</style>
