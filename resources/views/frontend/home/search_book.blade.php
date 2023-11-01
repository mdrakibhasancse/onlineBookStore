<ul class="search-btn">
    @forelse ($books as $book)
    <li style="padding:5px; ">
        <a style="color: black;" href="{{ url("/single_book/$book->id")}}">{{ $book->name }}</a>
     </li>
    @empty
    <li style="color: red; padding:5px; ">Book Not Found</li>
    @endforelse()
</ul>

<style>
    li:hover {
    background: whitesmoke;
    cursor: pointer;
    border-radius: 5px;
 }


</style>



