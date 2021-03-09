today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
var week = today.getDate();

if (dd < 10) {
    dd = '0' + dd
}

if (mm < 10) {
    mm = '0' + mm
}

var d = new Date();

var week = new Array('SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT');

today = yyyy + '/' + mm + '/' + dd;
m_d_today = mm + '/' + dd;
m_today = week[d.getDay()];
