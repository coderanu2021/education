# Student Registration & Certificate Verification System

## Overview
This system provides two main features:
1. Student Registration Form
2. Certificate Verification System

## Features Implemented

### 1. Student Registration System

#### Database Structure
- **Table**: `students`
- **Fields**:
  - `full_name` - Student's full name (required)
  - `email` - Unique email address (required)
  - `phone` - Contact number (required)
  - `address` - Physical address (optional)
  - `date_of_birth` - Date of birth (optional)
  - `gender` - Gender selection (male/female/other)
  - `qualification` - Educational qualification (optional)
  - `course_id` - Selected course (required, foreign key)
  - `status` - Registration status (pending/approved/rejected)

#### Public Registration Form
- **URL**: `/register`
- **Route Name**: `students.register`
- **Features**:
  - User-friendly form with validation
  - Course selection dropdown
  - Success message after submission
  - Error handling and display
  - Responsive design matching site theme

#### Admin Panel Management
- **Location**: Filament Admin Panel → Students
- **Features**:
  - View all student registrations
  - Filter by status and course
  - Search by name, email, or phone
  - Approve/reject registrations
  - Edit student information
  - View detailed student information
  - Bulk actions support

### 2. Enhanced Certificate Verification

#### Existing Features
- **URL**: `/verify-certificate`
- **Route Name**: `certificates.verify`
- **Features**:
  - Search by certificate code
  - Display certificate details
  - Download PDF certificate
  - Visual feedback (success/error)

#### New API Endpoint
- **URL**: `/api/check-certificate`
- **Method**: POST
- **Parameters**: `code` (certificate code)
- **Response**: JSON with certificate details or error
- **Use Case**: For AJAX/API integrations

## Usage Guide

### For Students

#### How to Register:
1. Visit `/register` on the website
2. Fill in all required fields (marked with *)
3. Select your desired course
4. Submit the form
5. Wait for admin approval

#### How to Verify Certificate:
1. Visit `/verify-certificate`
2. Enter your certificate code (e.g., CERT-XXXXXX)
3. Click search or press Enter
4. View certificate details
5. Download PDF if needed

### For Administrators

#### Managing Student Registrations:
1. Login to Filament admin panel
2. Navigate to "Students" menu
3. View all registrations
4. Use filters to find specific students
5. Click "View" to see full details
6. Click "Edit" to update information or change status
7. Approve/reject registrations by changing status

#### Managing Certificates:
1. Navigate to "Certificates" menu
2. Create new certificates for approved students
3. Generate unique certificate codes
4. Students can verify using these codes

## API Integration

### Check Certificate via API

```javascript
// Example AJAX request
fetch('/api/check-certificate', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({
        code: 'CERT-123456'
    })
})
.then(response => response.json())
.then(data => {
    if (data.valid) {
        console.log('Certificate found:', data.data);
    } else {
        console.log('Certificate not found');
    }
});
```

## Database Migration

To set up the students table, run:
```bash
php artisan migrate
```

## Routes Summary

| Route | Method | URL | Purpose |
|-------|--------|-----|---------|
| students.register | GET | /register | Show registration form |
| students.store | POST | /register | Submit registration |
| certificates.verify | GET | /verify-certificate | Show verification page |
| certificates.check | POST | /api/check-certificate | API endpoint for verification |
| certificates.download | GET | /certificates/{id}/download | Download certificate PDF |

## Models & Relationships

### Student Model
- Belongs to: Course
- Fillable fields: full_name, email, phone, address, date_of_birth, gender, qualification, course_id, status

### Certificate Model
- Belongs to: Course
- Fillable fields: student_name, course_id, certificate_code, certificate_note, issue_date

## Validation Rules

### Student Registration
- full_name: required, string, max 255 characters
- email: required, valid email, unique
- phone: required, string, max 20 characters
- course_id: required, must exist in courses table
- Other fields: optional with appropriate validation

## Status Workflow

### Student Registration Status
1. **Pending** - Initial status after registration
2. **Approved** - Admin approves the registration
3. **Rejected** - Admin rejects the registration

## Future Enhancements

Potential improvements:
- Email notifications on registration
- Student dashboard for tracking status
- Automatic certificate generation on approval
- Bulk certificate generation
- Certificate templates customization
- QR code on certificates for quick verification
