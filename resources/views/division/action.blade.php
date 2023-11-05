<a href="{{ route('divisions.edit', $id) }}" class="btn btn-success">Edit</a>
<form action="{{ route('divisions.destroy', $id) }}" method="POST" onsubmit="return confirmDelete()">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
