<html>

<head>
    <title>Travel Allowance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script href="../files/js/jquery-3.4.1.min.js"></script>
    <script href="../files/js/bootstrap.min.js"></script>
    <link href="../files/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../files/css/form.css" rel="stylesheet" type="text/css">

    <script language="JavaScript">
        var count = 0;
        var count2 = 0;

        function valu() {

            var counter1 = 1;
            var counter2 = 1;
            var prev = -1;
            var flag = 1;
            if (count2 == 0) {

                window.alert("Add at least one entry.");
                return false;

            }
            else {
                var m = false;
                while (counter2 <= count2) {

                    var x = "yo_" + counter1;
                    console.log(x);
                    var y = document.getElementById(x);
                    console.log('Start');

                    if (y) {

                        var dat = y.getElementsByTagName("input");
                        var nn = dat.length;
                        console.log("nn = " + nn);
                        var con = counter2 & flag;
                        console.log("con = " + con);
                        if (con) {

                            var sd = (dat[0].value);
                            console.log(sd);
                            var ed = (dat[1].value);
                            console.log(ed);

                            if (nn > 3) {

                                var fs = dat[2].value;
                                var ts = dat[3].value;
                                var dt = dat[4].value;
                                var at = dat[5].value;
                                var t = dat[6].value;
                                var d = dat[7].value;
                                var o = dat[8].value;

                                console.log(fs);
                                console.log(ts);
                                console.log(dt);
                                console.log(at);
                                console.log(t);
                                console.log(d);
                                console.log(o);

                            } else {

                                var o = dat[2].value;
                                console.log(o);

                            }
                            flag = 0;

                        } else {

                            var sd = (dat[2].value);
                            console.log(sd);
                            var ed = (dat[3].value);
                            console.log(ed);

                            if (nn > 5) {

                                var fs = dat[4].value;
                                var ts = dat[5].value;
                                var dt = dat[6].value;
                                var at = dat[7].value;
                                var t = dat[8].value;
                                var d = dat[9].value;
                                var o = dat[10].value;

                                console.log(fs);
                                console.log(ts);
                                console.log(dt);
                                console.log(at);
                                console.log(t);
                                console.log(d);
                                console.log(o);

                            } else {

                                var o = dat[4].value;
                                console.log(o);

                            }

                        }
                        if (dt) {

                            targetS = sd;
                            targetS += " ";
                            targetS += dt;
                            dt = new Date(targetS);
                            dt = dt.getTime();
                            console.log(dt);
                        }
                        if (at) {

                            targetE = ed
                            targetE += " ";
                            targetE += at;
                            at = new Date(targetE);
                            at = at.getTime();
                            console.log(at);
                        }
                        if (sd) {
                            sd = Date.parse(sd);
                            console.log(sd);
                        }
                        if (ed) {
                            ed = Date.parse(ed);
                            console.log(ed);
                        }


                        if (ed < sd) {

                            window.alert("End Date should not be before Start Date");
                            document.getElementById("endDate_" + counter1).focus();
                            m = false;
                            break;

                        } else {

                            console.log("Yup....everything's alright.");
                            m = true;

                        }
                        console.log("con again = " + con);

                        if (ed == sd) {
                            console.log("sd == ed");
                            if (at <= dt) {

                                window.alert("Departure time cannot be after arrival time");
                                document.getElementById("arrTime_" + counter1).focus();
                                m = false;
                                break;

                            } else {
                                console.log("Yup....everything's alright even here.");
                                m = true;

                            }

                        }


                        if (!con) {

                            var xx = "yo_" + prev;
                            var yy = document.getElementById(xx);
                            var daa = yy.getElementsByTagName("input");
                            var nnn = daa.length;
                            console.log("nnn = " + nnn);
                            var sd2;
                            var ed2;
                            if (nnn == 3 || nnn == 9) {

                                sd2 = (daa[0].value);
                                console.log(sd2);
                                ed2 = (daa[1].value);
                                console.log(ed2);

                                if (nnn > 3) {

                                    var fs2 = daa[2].value;
                                    var ts2 = daa[3].value;
                                    var dt2 = daa[4].value;
                                    var at2 = daa[5].value;
                                    var t2 = daa[6].value;
                                    var d2 = daa[7].value;
                                    var o2 = daa[8].value;

                                    console.log(fs2);
                                    console.log(ts2);
                                    console.log(dt2);
                                    console.log(at2);
                                    console.log(t2);
                                    console.log(d2);
                                    console.log(o2);

                                } else {

                                    var o2 = daa[2].value;
                                    console.log(o2);

                                }

                            } else {

                                var sd2 = (daa[2].value);
                                console.log(sd);
                                var ed2 = (daa[3].value);
                                console.log(ed);

                                if (nnn > 5) {

                                    var fs2 = daa[4].value;
                                    var ts2 = daa[5].value;
                                    var dt2 = daa[6].value;
                                    var at2 = daa[7].value;
                                    var t2 = daa[8].value;
                                    var d2 = daa[9].value;
                                    var o2 = daa[10].value;

                                    console.log(fs2);
                                    console.log(ts2);
                                    console.log(dt2);
                                    console.log(at2);
                                    console.log(t2);
                                    console.log(d2);
                                    console.log(o2);

                                } else {

                                    var o2 = daa[4].value;
                                    console.log(o2)

                                }

                            }
                            if (dt2) {

                                targetS2 = sd2;
                                targetS2 += " ";
                                targetS2 += dt2;
                                dt2 = new Date(targetS2);
                                dt2 = dt2.getTime();
                                console.log(dt2);

                            }
                            if (at2) {

                                targetE2 = ed2;
                                targetE2 += " ";
                                targetE2 += at2;
                                at2 = new Date(targetE2);
                                at2 = at2.getTime();
                                console.log(at2);

                            }
                            if (sd2) {
                                sd2 = Date.parse(sd2);
                                console.log(sd2);
                            }
                            if (ed2) {
                                ed2 = Date.parse(ed2);
                                console.log(ed2);
                            }

                            if (ed2 > sd) {

                                window.alert("Start date of next journey cannot be before end date of previous journey.");
                                document.getElementById("startDate_" + counter1).focus();
                                m = false;
                                break;

                            } else {
                                if (ed2 == sd) {

                                    if (at2 > dt) {

                                        window.alert("Second journey cannot commence without finishing first journey.")
                                        document.getElementById("depTime_" + counter1).focus();
                                        m = false;
                                        break;

                                    } else {
                                        m = true;
                                    }

                                } else {

                                    m = true;

                                }
                            }

                        }

                        prev = counter1;

                        counter2++;
                        counter1++;

                    } else {

                        counter1++;

                    }
                }
            }
            return m;
        }

        function getCount() {
            var m = false;
            // window.alert(count);
            if (valu()) {
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
                // count = count - 1;
                count2 = count2 - 1;
            }
        }

        function predict() {

            var x = document.getElementById("endDate_"+(count-1));
            if (x) {

                var y = x.value;
                document.getElementById("startDate_"+count).setAttribute("value", y);

            }


        }
        
        function insertNewRow() {

            count = count + 1;
            count2 = count2 + 1;
            var startDate = "startDate_" + count;
            var d = document.getElementById("travelAllowance");
            var d1 = document.getElementById("yo1");
            var d2 = document.getElementById("yo2");

            var addi = "<div class = 'row justify-content-center centerBlock' id = 'yo_" + count + "'>";
            if (count > 1) {

                addi += "<div class = 'row chec'>"
                    + "Is the gap eligible for TA? &nbsp&nbsp&nbsp&nbsp<input type = 'radio' id = 'continuous_" + count + "' value = 'yes' checked = 'checked' name = 'conti_" + count + "' > &nbspYes&nbsp&nbsp<br><input type = 'radio' id = 'continuous_" + count + "' value = 'no'  name = 'conti_" + count + "' > &nbspNo </div>";

            }

            addi += "<div class='row' id = 'first'>"
                // + count
                + "<div class='form-row' id = 'firstf'>"
                + "<div class='col-lg-3 col-xs-12' id = 'first1'>"
                + "<div class='form-group'>"
                + "<div class = 'sss'>"
                + "<label>Start Date *</label>"
                + "<input type='date'  placeholder='Start Date' required = 'required' value = '' class = 'startDate form-control formData' id = '" + startDate + "' name='" + startDate + "'>"
                + "</div>"
                + "</div>"
                + "</div>"
                + "<div class='col-lg-3 col-xs-12' id = 'first2'>"
                + "<div class='form-group'>"
                + "<div class = sss>"
                + "<label>End Date *</label>"
                + "<input type='date'  class = 'endDate form-control formData' required = 'required' id = 'endDate_" + count + "' name = 'endDate_" + count + "' placeholder = 'Enter your Name'>"
                + "</div>"
                + "</div>"
                + "</div>"
                + "<div class='col-lg-3 col-xs-12' id = 'first3'>"
                + "<div class='form-group'>"
                + "<div class = sss>"
                + "<label>Source Station *</label>"
                + "<input type = 'text'  class = 'fromStation form-control formData' value = '' required = 'required' id = 'fromStation_" + count + "' name = 'fromStation_" + count + "' placeholder = 'Enter Source Station'>"
                + "</div>"
                + "</div>"
                + "</div>"
                + "<div class='col-lg-3 col-xs-12' id = 'first4'>"
                + "<div class='form-group'>"
                + "<div class = sss>"
                + "<label>Destination Station *</label>"
                + "<input type = 'text'  class = 'toStation form-control formData' required = 'required' value = '' id = 'toStation_" + count + "' name = 'toStation_" + count + "' placeholder = ' Destination Station'>"
                + "</div>"
                + "</div>"
                + "</div>"
                + "<div class='col-lg-3 col-xs-12' id = 'second1'>"
                + "<div class='form-group'>"
                + "<div class = sss>"
                + "<label>Departure Time *</label>"
                + "<input type = 'time'  class = 'depTime form-control formData' id = 'depTime_" + count + "' required = 'required' name = 'depTime_" + count + "'>"
                + "</div>"
                + "</div>"
                + "</div>"
                + "<div class='col-lg-3 col-xs-12' id = 'second2'>"
                + "<div class='form-group'>"
                + "<div class = sss>"
                + "<label>Arrival Time *</label>"
                + "<input type = 'time'  class = 'arrTime form-control formData' required = 'required' id = 'arrTime_" + count + "' name = 'arrTime_" + count + "'>"
                + "</div>"
                + "</div>"
                + "</div>"
                + "<div class='col-lg-3 col-xs-12' id = 'second3'>"
                + "<div class='form-group'>"
                + "<div class = sss>"
                + "<label>Train Number *</label>"
                + "<input type = 'text'  class = 'train form-control formData' value = '' required = 'required' id = 'train_" + count + "' name = 'train_" + count + "' placeholder = 'Enter Train number'>"
                + "</div>"
                + "</div>"
                + "</div>"
                + "<div class='col-lg-3 col-xs-12' id = 'second4'>"
                + "<div class='form-group'>"
                + "<div class = sss>"
                + "<label>Distance</label>"
                + "<input type = 'text' class = 'distance form-control formData' value = '' id = 'distance_" + count + "' name = 'distance_" + count + "' placeholder = 'Enter Distance in KM'>"
                + "</div>"
                + "</div>"
                + "</div>"
                + "<div class='col-lg-3 col-xs-12' id = 'third1'>"
                + "<div class='form-group'>"
                + "<div class = sss>"
                + "<label>Objective of Journey *</label>"
                + "<input type = 'text'  class = 'objective form-control formData' required = 'required' value = '' id = 'objective_" + count + "' name = 'objective_" + count + "' placeholder = 'Objective of the journey'>"
                + "</div>"
                + "</div>"
                + "</div>"
                + "<div class='col-lg-3 col-xs-12' id = 'third2'>"
                + "<div class = 'container'>"
                + "<div class='form-group'>"
                + "<div class = sss>"
                + "<br>";
                if (count != 1) {
                    addi += '<button type="button" class="btn btn-lg btn-danger" onclick="deleteRo(this.parentNode.parentNode.parentNode.parentNode.previousSibling.firstChild.firstChild.lastChild.name)">Delete</button>';
                }
                addi += "</div>"
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
            count2 = count2 + 1;
            var startDate = "startDate_"+count;
            var d = document.getElementById("travelAllowance");


            var addi = "<div class = 'row justify-content-center centerBlock' id = 'yo_"+count+"'>";
            if (count > 1) {

                addi += "<div class = 'row chec'>"
                    +"Is the gap eligible for TA? &nbsp&nbsp&nbsp&nbsp<input type = 'radio' id = 'continuous_"+count+"' value = 'yes' checked = 'checked' name = 'conti_"+count+"' >&nbspYes&nbsp&nbsp<br><input type = 'radio' id = 'continuous_"+count+"' value = 'no'  name = 'conti_"+count+"' >No </div>";

            }

            addi+= "<div class = 'row' id = 'fourth'>"
                // +count
                +"<div class = 'form-row' id = 'fourthf'>"
                +"<div class = 'col-lg-3 col-xs-12' id = 'fourth1'>"
                +"<div class='form-group'>"
                +"<div class = 'sss'>"
                +"<label>Start Date *</label>"
                +"<input type = 'date'  placeholder='Start Date' class='startDate form-control formData' required = 'required' id='startDate_"+count+"' name='startDate_"+count+"'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class = 'col-lg-3 col-xs-12' id = 'fourth2'>"
                +"<div class='form-group'>"
                +"<div class = 'sss'>"
                +"<label>End Date *</label>"
                +"<input type = 'date'  placeholder='Start Date' class='endDate form-control formData' id='endDate_"+count+"' required = 'required' name='endDate_"+count+"'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-4 col-xs-12' id = 'fourth3'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<label>Objective of Stay *</label>"
                +"<input type = 'text'  class = 'objective form-control formData' value = '' id = 'objective_"+count+"' required = 'required' name = 'objective_"+count+"' placeholder = 'Objective of Stay'>"
                +"</div>"
                +"</div>"
                +"</div>"
                +"<div class='col-lg-2 col-xs-12' id = 'fourth4'>"
                +"<div class = 'container'>"
                +"<div class='form-group'>"
                +"<div class = sss>"
                +"<br>";
                if (count != 1) {
                    addi += '<button type="button" class="btn btn-lg btn-danger" onclick="deleteRo(this.parentNode.parentNode.parentNode.parentNode.previousSibling.firstChild.firstChild.lastChild.name)">Delete</button>';
                }
                addi += "</div>"
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
        <a href = "../">
        <h2>
            IRISET TRAVELLING ALLOWANCE JOURNAL (β)
        </h2>
        </a>
    </div>

    <form method='POST' target='_blank' action='trial.php' onsubmit="return getCount()">
        <div class= 'row'>
            <div class='form-row'>
                <div class='form-group col-sm-4 col-md-2 formLabel'>
                    <div class='fff'>
                        <label for="inputName">Name *</label>
                        <input type='text' name = 'name' required = 'required' placeholder='Your Name' value = '' class="form-control form-control-lg formData" id="inputEmail4">
                    </div>
                </div>
                <div class='form-group col-sm-4 col-md-2 formLabel'>
                    <div class='fff'>
                        <label for="inputDesignation">Designation *</label>
                        <input type='text' name = 'designation' required = 'required' value='IRSSE(P)-2018' placeholder='Designation'  class="form-control form-control-lg formData" id="inputEmail4">
                    </div>
                </div>
                <div class='form-group col-sm-4 col-md-2 formLabel'>
                    <div class='fff'>
                        <label for='inputMonth'>Month *</label>
                        <input type='text' name='month' required = 'required' placeholder='TA Month' value = '' class="form-control form-control-lg formData" id="inputEmail4">
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
    <div class="row">

    </div>
</div>
</body>