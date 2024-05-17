<form action="{{ $action }}" method="POST">
    @csrf
    @method("PATCH")


    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="form-control" >
    </div>

    <select id="session" name="session">
            <option value="07:00-11:00">07:00-11:00</option>
            <option value="13:00-17:00">13:00-17:00</option>
     </select>
</div>
    
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required>
                <option value="available" {{ (old('status', $offschedule->status ?? '') == 'available') ? 'selected' : '' }}>Available</option>
                <option value="scheduled" {{ (old('status', $offschedule->status ?? '') == 'scheduled') ? 'selected' : '' }}>Scheduled</option>
                <option value="complete" {{ (old('status', $offschedule->status ?? '') == 'complete') ? 'selected' : '' }}>Complete</option>
            </select>
        </div>
   

    <button type="submit" class="btn btn-success">Save</button>
</form>