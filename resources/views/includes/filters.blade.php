
<div id="form">
<form method="get" action="{{route("advertisements.index")}}">
    <div class="row">

    <div class="form-group input-fld col-1">
        <select  type="text" name="TypeAdvertise" class="form-control ">
            <option value="Продаж">Продаж</option>
            <option value="Оренда">Оренда</option>
            <option value="Подобова оренда">Подобова оренда</option>
        </select>
    </div>
    <div class="form-group input-fld col-1 ">
        <select  type="text" name="TypeHouse" class="form-control ">
            <option value="Квартира">Квартира</option>
            <option value="Будинок">Будинок</option>
            <option value="Кімната">Кімната</option>
            <option value="Ділянка">Ділянка</option>
            <option value="Комерційна">Комерційна</option>
        </select>
    </div>
        <div class="form-group input-fld col-2">
            <input type="text" name="Place" placeholder="Місто" class="form-control ">
        </div>

        <div class="form-label-group input-fld input-with-label col-1 " >
            <label for="Superficiality">Поверховість</label>
            <input type="number" min="1" max="99" name="SuperficialityFrom" class="form-control"
                   placeholder="Від"
                   autofocus="">

        </div>
        <div class="form-group  input-fld  col-1 ">
            <input type="number" min="1" max="99" name="SuperficialityTo" class="form-control"
                   placeholder="До"
                   autofocus="">
        </div>
    </div>
    <div class="row">
        <div class="form-group  input-fld col-2">
            <input  type="text" name="Address" placeholder="Адреса" class="form-control ">

        </div>
        <div class="form-group  input-fld  col-2 ">
            <select class="form-control"  type="text" name="RoomNum" id="RoomNum">
                <option value="" disabled selected>Кількість кімнат</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
        </div>

        <div class="form-group input-fld col-2 ">
            <select  type="text" name="Price"  class="form-control ">
                <option value="" disabled selected>Ціна</option>
                <option value="До 25000$">До 25000$</option>
                <option value="Від 25000$ до 50000$">Від 25000$ до 50000$</option>
                <option value="Від 50000$ до 75000$">Від 50000$ до 75000$</option>
                <option value="Від 75000$ до 100000$">Від 75000$ до 100000$</option>
            </select>
        </div>
        <div class="form-group input-fld col-1">
            <input type="text" name="Area" placeholder="Площа" class="form-control ">
        </div>
        <div class="form-label-group input-fld input-with-label col-2">
        <button id="confirm-but" class="btn btn-primary " type="submit">Застосувати</button>
        </div>
    </div>



</form>
</div>
<button id="but" type="button" onmousedown="viewDiv()" class="btn btn-primary">Розгорнути Фільтри</button>

