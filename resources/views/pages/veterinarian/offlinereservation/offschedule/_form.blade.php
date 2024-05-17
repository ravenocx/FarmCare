<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)


    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="form-control" >
    </div>

    <div class="form-group">
    <label for="session">Session</label>
    <select id="session" name="session">
            <option value="07:00-11:00">07:00-11:00</option>
            <option value="13:00-17:00">13:00-17:00</option>
     </select>
</div>


    <button type="submit" class="btn btn-success">Save</button>
</form>