<h1>Edit Book</h1>

<form action="{{ route('books.update', $book->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <label>Title:</label>
    <input type="text"
           name="title"
           value="{{ $book->title }}"
           required>
    <br><br>

    <label>Author:</label>
    <input type="text"
           name="author"
           value="{{ $book->author }}"
           required>
    <br><br>

    <label>Published Date:</label>
    <input type="date"
           name="published_date"
           value="{{ $book->published_date }}"
           required>
    <br><br>

    <button type="submit">
        Update
    </button>

</form>