@csrf

<div class="modal-body">
    <div class="form-group">
        <label for="title">اسم المنتج :</label>

        <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">

        <input type="text" class="form-control" name="Product_name" id="Product_name">
    </div>

    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
    <select name="section_name" id="section_name" class="custom-select my-1 mr-sm-2" required>
        <option value="" selected disabled> --حدد القسم--</option>
        @foreach ($sections as $section)
        <option value="{{ $section->id }}">{{ $section->section_name }}</option>

        @endforeach
    </select>

    <div class="form-group">
        <label for="des">ملاحظات :</label>
        <textarea name="description" cols="20" rows="5" id='description'
            class="form-control"></textarea>
    </div>

</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-success">تاكيد</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
</div>


