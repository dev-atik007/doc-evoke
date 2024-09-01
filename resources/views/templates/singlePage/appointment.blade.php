@extends('templates.layouts.frontend')
@section('content')

<section id="appointment" class="appointment section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Make an Appointment</h2>
            <p>A doctor's visit, also known as a physician office visit or a consultation, or a ward round in an inpatient care context, is a meeting between a patient with a physician to get health advice or treatment plan for a symptom or condition, most often at a professional health facility such as a doctor's office, clinic or ...</p>
        </div>

        <form action="" method="post" role="form" class="form">
            <input type="hidden" name="_token" value="1tniyCi2X1pBSANIG77yvEJgUbaSzYsh4F6684hw" autocomplete="off">
            <div class="row">
                <div class="col-md-4 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required="">

                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">

                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group mt-3">
                    <input type="datetime" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">

                </div>
                <div class="col-md-4 form-group mt-3">
                    <select name="department" id="department" class="form-select">
                        <option value="" selected="" disabled="">Select Department</option>

                        <option value="5" data-doctors="[]">A gastroenterologist</option>
                        <option value="2" data-doctors="[]">Dental</option>
                        <option value="3" data-doctors="[{&quot;id&quot;:14,&quot;name&quot;:&quot;Atikur Rahman&quot;,&quot;username&quot;:&quot;atik777&quot;,&quot;email&quot;:&quot;atik@gmail.com&quot;,&quot;password&quot;:&quot;eyJpdiI6IjFnSzkvOSt2TlRPWUNDanBvWXV5aVE9PSIsInZhbHVlIjoiWTQzVTlwdjB4dUZRbGJZVFFVSlV4dz09IiwibWFjIjoiNmJhMDNmOTcxMTllNzU0ZjQ2ZTQ4MjgwNmQ0ZTNlM2M0ZWNlMzY1ZTgzNjZiY2NhM2YxN2UzZjRkYjk0YjU0OSIsInRhZyI6IiJ9&quot;,&quot;mobile&quot;:&quot;+880123456789&quot;,&quot;address&quot;:&quot;Road 01, Sector 10, Uttara&quot;,&quot;balance&quot;:&quot;0.00000000&quot;,&quot;image&quot;:&quot;664c62cf427871716282063.jpg&quot;,&quot;qualification&quot;:&quot;In Bangladesh, the MBBS course comprises five years, followed by a compulsory rotatory internship of one year, its own opt-in country. The course follows the semester system, each semester consisting of six months.&quot;,&quot;status&quot;:1,&quot;featured&quot;:0,&quot;about&quot;:&quot;someone who is experienced and certified to practice medicine to help maintain or restore physical and mental health.&quot;,&quot;slot_type&quot;:null,&quot;serial_or_slot&quot;:null,&quot;start_time&quot;:null,&quot;end_time&quot;:null,&quot;serial_day&quot;:0,&quot;max_serial&quot;:0,&quot;duration&quot;:0,&quot;fees&quot;:599,&quot;department_id&quot;:3,&quot;location_id&quot;:2,&quot;created_at&quot;:&quot;2024-05-21T09:01:05.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-05-21T09:01:05.000000Z&quot;}]">hematologist</option>
                        <option value="1" data-doctors="[{&quot;id&quot;:8,&quot;name&quot;:&quot;Sanzid&quot;,&quot;username&quot;:&quot;doctor&quot;,&quot;email&quot;:&quot;sanzid@gmail.com&quot;,&quot;password&quot;:&quot;$2y$12$UxOlmUIMJBB.UWVQd5IIl.7r3g\/F4.QTg5cnevuUy\/UBWDQ0U40fu&quot;,&quot;mobile&quot;:&quot;8765&quot;,&quot;address&quot;:&quot;Raj&quot;,&quot;balance&quot;:&quot;0.00000000&quot;,&quot;image&quot;:&quot;6635ca4530e271714801221.jpg&quot;,&quot;qualification&quot;:&quot;&quot;,&quot;status&quot;:1,&quot;featured&quot;:1,&quot;about&quot;:&quot;&quot;,&quot;slot_type&quot;:1,&quot;serial_or_slot&quot;:[&quot;1&quot;,&quot;2&quot;,&quot;3&quot;,&quot;4&quot;,&quot;5&quot;,&quot;6&quot;,&quot;7&quot;,&quot;8&quot;,&quot;9&quot;,&quot;10&quot;,&quot;11&quot;,&quot;12&quot;,&quot;13&quot;,&quot;14&quot;,&quot;15&quot;,&quot;16&quot;,&quot;17&quot;,&quot;18&quot;,&quot;19&quot;,&quot;20&quot;,&quot;21&quot;,&quot;22&quot;,&quot;23&quot;,&quot;24&quot;,&quot;25&quot;,&quot;26&quot;,&quot;27&quot;,&quot;28&quot;,&quot;29&quot;,&quot;30&quot;,&quot;31&quot;,&quot;32&quot;,&quot;33&quot;,&quot;34&quot;,&quot;35&quot;,&quot;36&quot;,&quot;37&quot;,&quot;38&quot;,&quot;39&quot;,&quot;40&quot;,&quot;41&quot;,&quot;42&quot;,&quot;43&quot;,&quot;44&quot;,&quot;45&quot;,&quot;46&quot;,&quot;47&quot;,&quot;48&quot;,&quot;49&quot;,&quot;50&quot;,&quot;51&quot;,&quot;52&quot;,&quot;53&quot;,&quot;54&quot;,&quot;55&quot;,&quot;56&quot;,&quot;57&quot;,&quot;58&quot;,&quot;59&quot;,&quot;60&quot;,&quot;61&quot;,&quot;62&quot;,&quot;63&quot;,&quot;64&quot;,&quot;65&quot;,&quot;66&quot;,&quot;67&quot;,&quot;68&quot;,&quot;69&quot;,&quot;70&quot;,&quot;71&quot;,&quot;72&quot;,&quot;73&quot;,&quot;74&quot;,&quot;75&quot;,&quot;76&quot;,&quot;77&quot;,&quot;78&quot;,&quot;79&quot;,&quot;80&quot;,&quot;81&quot;,&quot;82&quot;,&quot;83&quot;,&quot;84&quot;,&quot;85&quot;,&quot;86&quot;,&quot;87&quot;,&quot;88&quot;,&quot;89&quot;,&quot;90&quot;],&quot;start_time&quot;:&quot;&quot;,&quot;end_time&quot;:&quot;&quot;,&quot;serial_day&quot;:30,&quot;max_serial&quot;:90,&quot;duration&quot;:0,&quot;fees&quot;:40,&quot;department_id&quot;:1,&quot;location_id&quot;:1,&quot;created_at&quot;:null,&quot;updated_at&quot;:&quot;2024-05-20T17:18:46.000000Z&quot;},{&quot;id&quot;:12,&quot;name&quot;:&quot;Jenifer Lopez&quot;,&quot;username&quot;:&quot;Jenifer&quot;,&quot;email&quot;:&quot;jenifer@gmail.com&quot;,&quot;password&quot;:&quot;eyJpdiI6IkVNbmZBRWEyYkRJVkVyR0h0bmZPcmc9PSIsInZhbHVlIjoib2NMZ3lBK2NQTUxDbnBSUDRNZWJUQT09IiwibWFjIjoiNjE5OWJkMDBiMzdlMTk1MTBkM2U1NjY4M2M0OTcwNzY2ODZiNzJjNDcyOTMzZGI5MzRkMDMxZWUwYjg2MDY1NSIsInRhZyI6IiJ9&quot;,&quot;mobile&quot;:&quot;+8801777&quot;,&quot;address&quot;:&quot;Dhaka&quot;,&quot;balance&quot;:&quot;0.00000000&quot;,&quot;image&quot;:&quot;65ff5d2e992af1711234350.jpeg&quot;,&quot;qualification&quot;:&quot;complete a recognized medical education program and be licensed to practice medicine&quot;,&quot;status&quot;:0,&quot;featured&quot;:0,&quot;about&quot;:&quot;The most common path to becoming a doctor is to earn an MBBS (Bachelor of Medicine, Bachelor of Surgery) degree from a recognized medical college or university. The MBBS is a 5.5-year undergraduate degree that covers pre-clinical, para-clinica&quot;,&quot;slot_type&quot;:1,&quot;serial_or_slot&quot;:[&quot;1&quot;,&quot;2&quot;,&quot;3&quot;,&quot;4&quot;,&quot;5&quot;,&quot;6&quot;,&quot;7&quot;,&quot;8&quot;,&quot;9&quot;,&quot;10&quot;,&quot;11&quot;,&quot;12&quot;,&quot;13&quot;,&quot;14&quot;,&quot;15&quot;,&quot;16&quot;,&quot;17&quot;,&quot;18&quot;,&quot;19&quot;,&quot;20&quot;,&quot;21&quot;,&quot;22&quot;,&quot;23&quot;,&quot;24&quot;,&quot;25&quot;,&quot;26&quot;,&quot;27&quot;,&quot;28&quot;,&quot;29&quot;,&quot;30&quot;],&quot;start_time&quot;:&quot;&quot;,&quot;end_time&quot;:&quot;&quot;,&quot;serial_day&quot;:5,&quot;max_serial&quot;:30,&quot;duration&quot;:0,&quot;fees&quot;:33,&quot;department_id&quot;:1,&quot;location_id&quot;:1,&quot;created_at&quot;:&quot;2024-03-23T22:52:30.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-05-08T10:00:04.000000Z&quot;},{&quot;id&quot;:13,&quot;name&quot;:&quot;Robert Fred Atik&quot;,&quot;username&quot;:&quot;robert777&quot;,&quot;email&quot;:&quot;robert12@gmail.com&quot;,&quot;password&quot;:&quot;$2y$12$UxOlmUIMJBB.UWVQd5IIl.7r3g\/F4.QTg5cnevuUy\/UBWDQ0U40fu&quot;,&quot;mobile&quot;:&quot;+8803564&quot;,&quot;address&quot;:&quot;Uttara, Dhaka&quot;,&quot;balance&quot;:&quot;0.00000000&quot;,&quot;image&quot;:&quot;6639191cdb1ba1715018012.jpg&quot;,&quot;qualification&quot;:&quot;Junior Doctor&quot;,&quot;status&quot;:0,&quot;featured&quot;:0,&quot;about&quot;:&quot;No just uyghb&quot;,&quot;slot_type&quot;:1,&quot;serial_or_slot&quot;:[&quot;1&quot;,&quot;2&quot;,&quot;3&quot;,&quot;4&quot;,&quot;5&quot;,&quot;6&quot;,&quot;7&quot;,&quot;8&quot;,&quot;9&quot;,&quot;10&quot;,&quot;11&quot;,&quot;12&quot;,&quot;13&quot;,&quot;14&quot;,&quot;15&quot;,&quot;16&quot;,&quot;17&quot;,&quot;18&quot;,&quot;19&quot;,&quot;20&quot;,&quot;21&quot;,&quot;22&quot;,&quot;23&quot;,&quot;24&quot;,&quot;25&quot;,&quot;26&quot;,&quot;27&quot;,&quot;28&quot;,&quot;29&quot;,&quot;30&quot;,&quot;31&quot;,&quot;32&quot;,&quot;33&quot;,&quot;34&quot;,&quot;35&quot;,&quot;36&quot;,&quot;37&quot;,&quot;38&quot;,&quot;39&quot;,&quot;40&quot;,&quot;41&quot;,&quot;42&quot;,&quot;43&quot;,&quot;44&quot;,&quot;45&quot;,&quot;46&quot;,&quot;47&quot;,&quot;48&quot;,&quot;49&quot;,&quot;50&quot;,&quot;51&quot;,&quot;52&quot;,&quot;53&quot;,&quot;54&quot;,&quot;55&quot;,&quot;56&quot;,&quot;57&quot;,&quot;58&quot;,&quot;59&quot;,&quot;60&quot;,&quot;61&quot;,&quot;62&quot;,&quot;63&quot;,&quot;64&quot;,&quot;65&quot;,&quot;66&quot;,&quot;67&quot;,&quot;68&quot;,&quot;69&quot;,&quot;70&quot;,&quot;71&quot;,&quot;72&quot;,&quot;73&quot;,&quot;74&quot;,&quot;75&quot;,&quot;76&quot;,&quot;77&quot;,&quot;78&quot;,&quot;79&quot;,&quot;80&quot;,&quot;81&quot;,&quot;82&quot;,&quot;83&quot;,&quot;84&quot;,&quot;85&quot;,&quot;86&quot;,&quot;87&quot;,&quot;88&quot;,&quot;89&quot;,&quot;90&quot;,&quot;91&quot;,&quot;92&quot;,&quot;93&quot;,&quot;94&quot;,&quot;95&quot;,&quot;96&quot;,&quot;97&quot;,&quot;98&quot;,&quot;99&quot;,&quot;100&quot;],&quot;start_time&quot;:null,&quot;end_time&quot;:null,&quot;serial_day&quot;:40,&quot;max_serial&quot;:100,&quot;duration&quot;:0,&quot;fees&quot;:195,&quot;department_id&quot;:1,&quot;location_id&quot;:2,&quot;created_at&quot;:&quot;2024-05-06T17:53:33.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-05-20T17:18:23.000000Z&quot;},{&quot;id&quot;:15,&quot;name&quot;:&quot;Robert Charloes&quot;,&quot;username&quot;:&quot;robert442&quot;,&quot;email&quot;:&quot;robertcharloes@gmail.com&quot;,&quot;password&quot;:&quot;eyJpdiI6IlNHSWZMRTBKcy92S2JCTlJUVEtQZUE9PSIsInZhbHVlIjoic09vdlhPcWpYUFhGMjRFdGVWbkVCQT09IiwibWFjIjoiNzFmN2EwMTM5ZDBjNTJlYzQ0OGEyZDVkMzdmOThiMDEwN2MxMjdhMmZlMDUzYTFlOGU3NWVlZjRjMTdhNjNhZiIsInRhZyI6IiJ9&quot;,&quot;mobile&quot;:&quot;+88012345678&quot;,&quot;address&quot;:&quot;Banani, Dhaka&quot;,&quot;balance&quot;:&quot;0.00000000&quot;,&quot;image&quot;:&quot;664c64309600d1716282416.jpg&quot;,&quot;qualification&quot;:&quot;MBBS course comprises five years, followed by a compulsory rotatory internship of one year, its own opt-in country.&quot;,&quot;status&quot;:1,&quot;featured&quot;:0,&quot;about&quot;:&quot;someone who is experienced and certified to practice medicine to help maintain or restore physical and mental health.&quot;,&quot;slot_type&quot;:null,&quot;serial_or_slot&quot;:null,&quot;start_time&quot;:null,&quot;end_time&quot;:null,&quot;serial_day&quot;:0,&quot;max_serial&quot;:0,&quot;duration&quot;:0,&quot;fees&quot;:299,&quot;department_id&quot;:1,&quot;location_id&quot;:1,&quot;created_at&quot;:&quot;2024-05-21T09:06:59.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-05-21T09:06:59.000000Z&quot;}]">Oncology</option>
                    </select>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <select name="doctor_id" class="form-select">
                    </select>
                </div>
            </div>

            <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
            </div>

            <div class="text-center"><button type="submit">Make an Appointment</button></div>

        </form>
    </div>
</section>
@endsection