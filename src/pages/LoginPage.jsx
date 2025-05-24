// src/pages/LoginPage.jsx

import React, { useState } from 'react';
import axios from 'axios';
import './LoginPage.css'; // سننشئ هذا لاحقًا
import { useNavigate } from 'react-router-dom';

export default function LoginPage() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const navigate = useNavigate();

  const handleLogin = async (e) => {
    e.preventDefault();
    setError('');

    try {
      const response = await axios.post('http://localhost:8000/api/login', {
        email,
        password,
      });

      const { token, user } = response.data;
      localStorage.setItem('token', token);
      localStorage.setItem('user', JSON.stringify(user));
      navigate('/'); // إعادة التوجيه إلى الصفحة الرئيسية
    } catch (err) {
      setError('فشل تسجيل الدخول. تحقق من البيانات.');
    }
  };

  return (
    <div className="login-page">
      <h2>تسجيل الدخول</h2>
      <form onSubmit={handleLogin}>
        <input
          type="email"
          placeholder="البريد الإلكتروني"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          required
        />
        <input
          type="password"
          placeholder="كلمة المرور"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          required
        />
        <button type="submit">دخول</button>
      </form>
      {error && <p className="error">{error}</p>}
    </div>
  );
}
