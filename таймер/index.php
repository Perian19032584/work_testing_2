<style>
    .div{
        text-align: -webkit-center;
    }
    #input_time{
        width: 450px;
        display: inline-block;
        height: 35px;
        padding-left: 5px;
        letter-spacing: 1px;
    }
    #button{
        height: 35px;
        width: 100px;
    }
</style>
<br>

<div class="div">
    <input id="input_time" type="text" value="2021 03 15 15 30 25">
    <button id="button">Запустить</button>
</div>

<div id="show_timer"></div>

<script>//// И все таки Jquery лучше

    function diffSubtract(date1, date2) { //Просто отнимает от текущей даты мою дату(поле input)
        //Как ты работаешь? Как ты отнимаешь | Mon Mar 15 2021 13:58:06 GMT+0200 - такую запись?
        return date2 - date1;
    }



    let input_time = document.getElementById("input_time");
    let buttonRun = document.getElementById("button");
    let show_timer = document.getElementById("show_timer");

    buttonRun.addEventListener('click', () => {
        var time = input_time.value;
        var times = time.split(" ");

        let end_date = {
            "full_year": times[0],
            "month": times[1],
            "day": times[2],
            "hours": times[3],
            "minutes": times[4],
            "seconds": times[5]
        }

        let end_date_str = `${end_date['full_year']}-${end_date['month']}-${end_date['day']}T${end_date['hours']}:${end_date['minutes']}:${end_date['seconds']}`;

        console.log(end_date_str);

        var timer = setInterval(() => {

            let now  = new Date();
            let date = new Date(end_date_str);//Вся строка данных
            let ms_left = diffSubtract(now, date);//Получаем временую метку просто отнимая

            //console.log(ms_left)

            if(ms_left <= 0){
                clearInterval(timer);
                alert("Время закончилось");
            }else{
                let res = new Date(ms_left);//Мы из временной метки получаем дату, круто
                let str_timer = `${res.getUTCFullYear() - 1970}.${res.getUTCMonth()}.${res.getUTCDate() - 1} ${res.getUTCHours()}:${res.getUTCMinutes()}:${res.getUTCSeconds()}`;
                show_timer.innerHTML = str_timer;
            }
        }, 1000);

     });


</script>