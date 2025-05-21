import React from 'react';

export default function ProfilePage() {
  const user = JSON.parse(localStorage.getItem('user'));

  return (
    <div className="profile-page">
      <h1>الملف الشخصي</h1>
      {user ? (
        <div>
          <p><strong>الاسم:</strong> {user.name}</p>
          <p><strong>البريد الإلكتروني:</strong> {user.email}</p>
        </div>
      ) : (
        <p>لم يتم تسجيل الدخول بعد.</p>
      )}
    </div>
  );
}
