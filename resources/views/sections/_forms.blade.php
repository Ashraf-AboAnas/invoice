@csrf
<div class="form-group">
    <label for="exampleInputEmail1">اسم القسم</label>
    <input type="text" class="form-control" id="section_name_poup" name="section_name">
    <input type="hidden" name="id" id="id_poup" value="" >

    @error('section_name')
     <p class="text-danger">{{ $message }}</p>
     @enderror
</div>

<div class="form-group">
    <label for="exampleFormControlTextarea1">ملاحظات</label>
    <textarea class="form-control" id="description_poup" name="description" rows="3"></textarea>
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-success">تاكيد</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
</div>
