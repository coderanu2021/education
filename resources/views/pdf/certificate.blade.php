<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Certificate of Completion</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            height: 100%;
            border: 20px solid #002742;
            box-sizing: border-box;
            background-color: #fff;
            padding: 50px;
            text-align: center;
            position: relative;
        }
        .logo {
            font-size: 40px;
            font-weight: bold;
            color: #002742;
            margin-bottom: 20px;
        }
        .title {
            font-size: 50px;
            color: #ffc600;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .subtitle {
            font-size: 24px;
            color: #333;
            margin-bottom: 40px;
        }
        .presented-to {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }
        .student-name {
            font-size: 48px;
            font-weight: bold;
            color: #002742;
            border-bottom: 2px solid #002742;
            display: inline-block;
            margin-bottom: 30px;
            padding: 0 40px;
        }
        .course-name {
            font-size: 24px;
            color: #333;
            margin-bottom: 40px;
        }
        .note {
            font-size: 16px;
            font-style: italic;
            color: #555;
            max-width: 600px;
            margin: 0 auto 50px;
        }
        .footer {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        .signature {
            border-top: 1px solid #333;
            padding-top: 10px;
            width: 200px;
            float: left;
        }
        .date {
            border-top: 1px solid #333;
            padding-top: 10px;
            width: 200px;
            float: right;
        }
        .certificate-id {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">UNIARO UNIVERSITY</div>
        <div class="title">Certificate</div>
        <div class="subtitle">OF COMPLETION</div>
        
        <p class="presented-to">This is proudly presented to</p>
        <div class="student-name">{{ $certificate->student_name }}</div>
        
        <p class="presented-to">for successfully completing the course</p>
        <div class="course-name">{{ $certificate->course->title }}</div>
        
        @if($certificate->certificate_note)
        <div class="note">
            "{{ $certificate->certificate_note }}"
        </div>
        @endif
        
        <div class="footer" style="padding-top: 100px;">
            <div class="signature">Authorized Signature</div>
            <div class="date">Date: {{ $certificate->issue_date->format('M d, Y') }}</div>
        </div>
        
        <div class="certificate-id">Certificate ID: {{ $certificate->certificate_code }}</div>
    </div>
</body>
</html>
