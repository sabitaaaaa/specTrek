@extends('layouts.app')

@section('content')
<link rel="icon" href="{{ asset('images/logo.png') }}">

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        line-height: 1.6;
         padding: 0; 
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    a.create-btn {
        display: inline-block;
        background-color: #2e8b57;
        color: white;
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
        margin-bottom: 20px;
    }

    a.create-btn:hover {
        background-color: #2c6645ff;
    }
    .post-item {
        background: #fff;
        padding: 15px;
        border-radius: 6px;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }

    .post-item h3 {
        color: #333;
        margin-bottom: 10px;
    }

    .post-item p {
        color: #555;
    }

    .post-item img {
        margin-top: 10px;
        border-radius: 4px;
        max-width: 100%;
        height: auto;
    }

    .post-actions a,
    .post-actions form button {
        display: inline-block;
        margin-right: 10px;
        text-decoration: none;
        color: #027478;
        font-size: 14px;
        border: none;
        background: none;
        cursor: pointer;
        padding: 0;
    }

    .post-actions a:hover,
    .post-actions form button:hover {
        text-decoration: underline;
    }

    .post-actions form {
        display: inline;
    }

    .post-actions form button {
        color: red;
    }
    .post-item img {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
    margin-top: 10px;
}

/* for delete ================= */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-content {
    background: white;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.2);
    text-align: center;
}

.modal-content button {
    padding: 8px 14px;
    margin: 0 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#cancelDelete {
    background-color: #ccc;
}

#confirmDelete {
    background-color: red;
    color: white;
}

/*-------------------- arrow button ------------------ */
#scrollTopBtn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 999;
  font-size: 22px;
  background-color: #2e8b57;
  color: white;
  border: none;
  outline: none;
  padding: 12px 16px;
  border-radius: 50%;
  cursor: pointer;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
  display: none;
  transition: background-color 0.3s, transform 0.3s;
}

#scrollTopBtn:hover {
  background-color: #276341ff;
  transform: scale(1.1);
}
</style>

<h2> All Posts</h2>

<a href="{{ route('posts.create') }}" class="create-btn">+ Create New Post</a>

@foreach($posts as $post)
    <div class="post-item">
        <h3>{{ $post->title }}</h3>
        <p><strong>Author:</strong> {{ $post->author }}</p>

        @if($post->image)
            <img src="{{ asset('uploads/' . $post->image) }}" alt="Post Image">

        @endif

        <p>{{ Str::limit($post->content, 100) }}</p>

        <div class="post-actions">
            <a href="{{ route('posts.show', $post->id) }}">View</a> |
            <a href="{{ route('posts.edit', $post->id) }}">Edit</a> |
           <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="delete-form">

                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal-overlay" style="display: none;">
    <div class="modal-content">
        <p>Are you sure you want to delete this post?</p>
        <button id="cancelDelete">Cancel</button>
        <button id="confirmDelete">Yes, Delete</button>
    </div>
</div>

<button onclick="scrollToTop()" id="scrollTopBtn" title="Go to top">&#8679;</button>
<!-- ----------------arrow script ------ -->
<script>
  const scrollBtn = document.getElementById("scrollTopBtn");

  window.onscroll = function () {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
      scrollBtn.style.display = "block";
    } else {
      scrollBtn.style.display = "none";
    }
  };
  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  }

  </script>
  <script>
  let formToDelete = null;

  document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      formToDelete = form;
      document.getElementById('deleteModal').style.display = 'flex';
    });
  });

  document.getElementById('cancelDelete').addEventListener('click', function () {
    document.getElementById('deleteModal').style.display = 'none';
    formToDelete = null;
  });

  document.getElementById('confirmDelete').addEventListener('click', function () {
    if (formToDelete) formToDelete.submit();
  });
</script>

@endforeach

@endsection
