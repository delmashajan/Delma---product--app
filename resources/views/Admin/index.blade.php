<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <a class="btn btn-primary"  href="{{route('add.category')}}">Add Category</a>
    <ul class="list-group mt-3">
        <label for="">Categories</label>
        @foreach ($categories as $category )

            <ol class="list-group py-3">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">{{$category->name}}</div>
                  </div>
                  <a href="{{route('edit.category',['id'=>$category->id])}}" class="btn btn-primary">EDIT</a>
                  <div class="ms-2">
                    
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#deleteModal{{ $category->id }}">
                        Delete
                    </button>
                  </div>
                </li>
            </ol>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1"
              aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="{{route('delete.category')}}" method="POST">
                      @csrf
                      <div class="modal-body">
                        <p>Are you sure you want to delete the category "{{ $category->name }}"?</p>
                        <input type="hidden" name="id" value="{{ $category->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                  </form>
                  </div>
              </div>
          </div>
        @endforeach
      </ul>
</body>
</html>