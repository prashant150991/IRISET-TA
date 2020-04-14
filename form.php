<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--    <link href="./files/css/form.css" rel="stylesheet" type="text/css">-->
    <script href="./files/js/jquery-3.4.1.min.js"></script>
    <script href="./files/js/bootstrap.min.js"></script>
    <link href="files/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="files/css/form.css" rel="stylesheet" type="text/css">

    <script language="JavaScript">
        var count = 0;

        function validate() {

            var counter1 = 1;
            var counter2 = 1;
            var prev = -1;
            if (count == 0) {

                window.alert("Add at least one entry.");
                return false;

            }
            else {
                var m = false;
                while (counter2 <= count) {

                    // window.alert("xxx "+counter2);
                    var x = "yo_" + counter1;
                    var y = document.getElementById(x);
                    if (y) {
                        // console.log(y);
                        // window.alert("Yes1");

                        var dat = y.getElementsByTagName("input");
                        console.log(dat);
                        // break;
                        var sd = (dat[0].value);
                        // window.alert(sd);
                        var ed = (dat[1].value);
                        // window.alert(ed);
                        var nn = dat.length;
                        // window.alert(nn);

                        if (nn > 3) {
                            var fs = dat[2].value;
                            var ts = dat[3].value;
                            var dt = dat[4].value;
                            var at = dat[5].value;
                            var t = dat[6].value;
                            var d = dat[7].value;
                            var o = dat[8].value;
                        }
                        else {
                            var o = dat[2].value;
                            // window.alert("fhfh");
                        }
                        if (sd) {
                            sd = Date.parse(sd);
                            // window.alert(sd);
                        }
                        else {
                            // window.alert("Nah");
                        }
                        if (ed) {
                            ed = Date.parse(ed);
                            // window.alert(ed);
                        }
                        if (dt) {
                            targetS = dat[0].value;
                            targetS+= " ";
                            targetS+= dt;
                            dt = new Date(targetS);
                            dt = dt.getTime();
                            // window.alert(dt);
                        }
                        if (at) {
                            targetE = dat[1].value;
                            targetE+= " ";
                            targetE+= at;
                            at = new Date(targetE);
                            at = at.getTime();
                            // window.alert(at);
                        }
                        if (ed < sd) {

                            window.alert("End Date should not be before Start Date");
                            document.getElementById("endDate_"+counter1).focus();
                            m = false;
                            break;

                        }
                        else {

                            // window.alert("True");
                            if (ed == sd) {
                                // window.alert("True1");
                                if (nn > 3) {
                                    if (dt >= at) {
                                        window.alert("Start time cannot be after end time");
                                        document.getElementById("arrTime_" + counter1).focus();
                                        m = false;
                                        break;

                                    } else {
                                        // window.alert("True2");
                                        m = true;

                                    }
                                }
                                else {
                                    m = true;
                                    // window.alert("dddd")
                                }

                            }
                            else {
                                m = true;
                            }
                            if (m == false) {
                                break;
                            }

                        }
                        if (m == false) {
                            break;
                        }
                        if (prev == -1) {


                        }
                        else {

                            // window.alert("Into the wild");
                            // break;

                            var xx = "yo_" + prev;
                            // window.alert(xx);
                            var yy = document.getElementById(xx);
                            var daa = yy.getElementsByTagName("input");
                            // console.log(dat);
                            var nnn = daa.length;
                            var sd2 = (daa[0].value);
                            var ed2 = (daa[1].value);
                            if (nnn > 3) {
                                var fs2 = daa[2].value;
                                var ts2 = daa[3].value;
                                var dt2 = daa[4].value;
                                var at2 = daa[5].value;
                                var t2 = daa[6].value;
                                var d2 = daa[7].value;
                                var o2 = daa[8].value;
                            }
                            else {

                                var o2 = daa[2].value;

                            }


                            if (sd2) {
                                sd2 = Date.parse(sd2);
                            }
                            if (ed2) {
                                ed2 = Date.parse(ed2);
                            }
                            if (dt2) {

                                targetS2 = dat[0].value;
                                targetS2+= " ";
                                targetS2+= dt2;
                                dt2 = new Date(targetS2);
                                dt2 = dt2.getTime();

                            }
                            if (at2) {

                                targetE2 = dat[0].value;
                                targetE2+= " ";
                                targetE2+= at2;
                                at2 = new Date(targetE2);
                                at2 = at2.getTime();

                            }
                            if (ed2 > sd) {

                                window.alert("Start date of next journey cannot be before end date of previous journey.");
                                document.getElementById("startDate_"+counter1).focus();
                                m = false;
                                break;

                            }
                            else if (ed2 == sd) {

                                if(nnn > 3 && nn > 3) {
                                    if (at2 > dt) {

                                        window.alert("Second journey cannot commence without finishing first journey.")
                                        document.getElementById("depTime_" + counter1).focus();
                                        m = false;
                                        break;

                                    } else {
                                        m = true;
                                    }
                                }
                                else {
                                    m = true;
                                }
                            }

                        }
                        // m = true;
                        prev = counter1;
                        counter1++;
                        counter2++;

                    } else {

                        // window.alert("No");
                        // return false;
                        counter1++;

                    }

                }

            }
            return m;

        }

        function getCount() {
            var m = false;
            // window.alert(count);
            if (validate()) {
                document.getElementById("trr").setAttribute("value", count);
                m = window.confirm("Confirm Submit?");
            }
            return m;
        }

        function deleteRo(row){
            if (window.confirm("Are you sure you want to delete this entry?")) {
                // window.confirm()
                var c = row.length;
                c--;
                var d = row.charAt(c);
                var xx = "yo_" + d;
                var element = document.getElementById(xx);
                element.parentNode.removeChild(element);
                count = count - 1;
            }
        }

        function predict() {

            var x = document.getElementById("endDate_"+(count-1));
            if (x) {

                var y = x.value;
                document.getElementById("startDate_"+count).setAttribute("value", y);

            }


        }
        
        function insertNewRow(){

            count=count+1;
            var startDate = "startDate_"+count;
            var d = document.getElementById("travelAllowance");
            var d1 = document.getElementById("yo1");
            var d2 = document.getElementById("yo2");
            var addi = "<div class='row justify-content-center centerBlock' id = 'yo_"+count+"'>"
                +"<div class='row' id = 'first'>"
                +count
                +"<div class='form-row' id = 'firstf'>"
                +"<div class='col-lg-3 col-xs-12' id = 'first1'>"
                +"<div class='form-group'>"
                +"<div class = 'sss'>"
                +"<label>Start Date *</label>"
                +"<input type='date'  placeholder='Start Date' value = '' class = 'startDate form-control formData' id = '"+startDate+"' name='"+startDate+"'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-3 col-xs-12' id = 'first2'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<label>End Date *</label>"
                +"<input type='date'  class = 'endDate form-control formData' id = 'endDate_"+count+"' name = 'endDate_"+count+"' placeholder = 'Enter your Name'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-3 col-xs-12' id = 'first3'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<label>Source Station *</label>"
                +"<input type = 'text'  class = 'fromStation form-control formData' value = 'SC' id = 'fromStation_"+count+"' name = 'fromStation_"+count+"' placeholder = 'Enter Source Station'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-3 col-xs-12' id = 'first4'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<label>Destination Station *</label>"
                +"<input type = 'text'  class = 'toStation form-control formData' value = 'HWH' id = 'toStation_"+count+"' name = 'toStation_"+count+"' placeholder = ' Destination Station'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-3 col-xs-12' id = 'second1'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<label>Departure Time *</label>"
                +"<input type = 'time'  class = 'depTime form-control formData' id = 'depTime_"+count+"' name = 'depTime_"+count+"'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-3 col-xs-12' id = 'second2'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<label>Arrival Time *</label>"
                +"<input type = 'time'  class = 'arrTime form-control formData' id = 'arrTime_"+count+"' name = 'arrTime_"+count+"'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-3 col-xs-12' id = 'second3'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<label>Train Number *</label>"
                +"<input type = 'text'  class = 'train form-control formData' value = '12345' id = 'train_"+count+"' name = 'train_"+count+"' placeholder = 'Enter Train number'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-3 col-xs-12' id = 'second4'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<label>Distance</label>"
                +"<input type = 'text' class = 'distance form-control formData' value = '1600' id = 'distance_"+count+"' name = 'distance_"+count+"' placeholder = 'Enter Distance in KM'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-3 col-xs-12' id = 'third1'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<label>Objective of Journey *</label>"
                +"<input type = 'text'  class = 'objective form-control formData' value = 'Travelling for Field Training' id = 'objective_"+count+"' name = 'objective_"+count+"' placeholder = 'Objective of the journey'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-3 col-xs-12' id = 'third2'>"
                +"<div class = 'container'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<br>"
                +'<button type="button" class="btn btn-lg btn-danger" onclick="deleteRo(this.parentNode.parentNode.parentNode.parentNode.previousSibling.firstChild.firstChild.lastChild.name)">Delete</button>'
                +"</div>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<hr class='style4'>";

            d.insertAdjacentHTML('beforeend', addi);
            predict();

        }



        function insertRowForStay(){
            count=count+1;
            var startDate = "startDate_"+count;
            var d = document.getElementById("travelAllowance");

            var addi = "<div class = 'row justify-content-center centerBlock' id = 'yo_"+count+"'>"
                +"<div class = 'row' id = 'fourth'>"
                +"<div class = 'form-row' id = 'fourthf'>"
                +"<div class = 'col-lg-3 col-xs-12' id = 'fourth1'>"
                +"<div class='form-group'>"
                +"<div class = 'sss'>"
                +"<label>Start Date *</label>"
                +"<input type = 'date'  placeholder='Start Date' class='startDate form-control formData' id='startDate_"+count+"' name='startDate_"+count+"'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class = 'col-lg-3 col-xs-12' id = 'fourth2'>"
                +"<div class='form-group'>"
                +"<div class = 'sss'>"
                +"<label>End Date *</label>"
                +"<input type = 'date'  placeholder='Start Date' class='endDate form-control formData' id='endDate_"+count+"' name='endDate_"+count+"'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-4 col-xs-12' id = 'fourth3'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<label>Objective of Stay *</label>"
                +"<input type = 'text'  class = 'objective form-control formData' value = 'Stay for Field Training' id = 'objective_"+count+"' name = 'objective_"+count+"' placeholder = 'Objective of Stay'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-2 col-xs-12' id = 'fourth4'>"
                +"<div class = 'container'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<br>"
                +'<button type="button" class="btn btn-lg btn-danger" onclick="deleteRo(this.parentNode.parentNode.parentNode.parentNode.previousSibling.firstChild.firstChild.lastChild.name)">Delete</button>'
                +"</div>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<hr class='style4'>";

            d.insertAdjacentHTML('beforeend', addi);
            predict();
        }

    </script>

</head>

<body>

<div class='container'>
    <div class='row justify-content-center heading'>
        <h2>
            IRISET TRAVELLING ALLOWANCE JOURNAL
        </h2>
    </div>

    <form method='POST' action='trial.php' onsubmit="return getCount()">
        <div class= 'row'>
            <div class='form-row'>
                <div class='form-group col-sm-4 col-md-2 formLabel'>
                    <div class='fff'>
                        <label for="inputName">Name *</label>
                        <input type='text' name = 'name' placeholder='Your Name' value = 'Prathamesh Kakade' class="form-control form-control-lg formData" id="inputEmail4">
                    </div>
                </div>
                <div class='form-group col-sm-4 col-md-2 formLabel'>
                    <div class='fff'>
                        <label for="inputDesignation">Designation *</label>
                        <input type='text' name = 'designation' value='IRSSE(P)-2018' placeholder='Designation'  class="form-control form-control-lg formData" id="inputEmail4">
                    </div>
                </div>
                <div class='form-group col-sm-4 col-md-2 formLabel'>
                    <div class='fff'>
                        <label for='inputMonth'>Month *</label>
                        <input type='text' name='month'  placeholder='TA Month' value = 'April, 2020' class="form-control form-control-lg formData" id="inputEmail4">
                    </div>
                </div>
                <div class='form-group col-sm-4 col-md-2 formLabel'>
                    <div class='fff'>
                        <label for='inputPayBand'>Pay Band *</label>
                        <input type='text' name = 'payBand' value='15,600 - 39,100' placeholder='Your PayBand' required = 'required' class="form-control form-control-lg formData" id="inputEmail4">
                    </div>
                </div>
                <div class='form-group col-sm-4 col-md-2 formLabel'>
                    <div class='fff'>
                        <label for='inputBasicPay'>Basic Pay *</label>
                        <input type='text' name='basicPay' value='57,800' placeholder='Your Basic Pay' required = 'required' class="form-control form-control-lg formData" id="inputEmail4">
                    </div>
                </div>
                <div class='form-group col-sm-4 col-md-2 formLabel'>
                    <div class='fff'>
                        <label for='inputDateOfJoining'>Date of Joining *</label>
                        <input type='text' name='dateOfJoining' value='8th July 2019' placeholder='Date Of Joining' required = 'required' class="form-control form-control-lg formData" id="inputEmail4">
                    </div>
                </div>
            </div>
        </div>
        <hr class='style4'>
        <div id='travelAllowance' class='row'>

        </div>
        <div class='row'>
            <div class='col-md-6 buffer'>
                <button type="button" class="btn btn-primary btn-lg btn-block" name = "addNewRow" value="" onclick="insertNewRow()">Add Travelling Details</button>
            </div>
            <br>
            <div class='col-md-6 buffer'>
                <button type="button" class="btn btn-primary btn-lg btn-block" name = "addNewRow1" value="" onclick="insertRowForStay()">Staying Details</button>
            </div>
            <br/>
        </div>
        <div class='row'>
            <div class='col buffer'>
                <input type="hidden" id = "trr" name="ttt" value="">
            </div>
        </div>
        <div class='row'>
            <div class='col buffer'>
                <button type="submit" class="btn btn-success btn-block"  name = "tutu">Submit</button>
            </div>
        </div>
    </form>
</div>
<!--<hr class="style4">-->

</body>