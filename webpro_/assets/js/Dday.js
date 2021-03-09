var Dday = new Date(2019, 11, 14);    // D-day(2017년 8월 30일)를 셋팅한다.
var now = new Date();                    // 현재(오늘) 날짜를 받아온다.

var gap = now.getTime() - Dday.getTime();    // 현재 날짜에서 D-day의 차이를 구한다.
var result = Math.floor(gap / (1000 * 60 * 60 * 24)) * -1;    // gap을 일(밀리초 * 초 * 분 * 시간)로 나눈다. 이 때 -1 을 곱해야 날짜차이가 맞게 나온다.
result = result- 31

var Ddayy = "<span>D - </span>" + result;
var Ddayy_1 = "D - " + result;