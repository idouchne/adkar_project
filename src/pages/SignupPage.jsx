import React, { useState } from "react";
import axios from "axios";
import "./SignupPage.css";
import { useNavigate } from "react-router-dom";

export default function SignupPage() {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [confirmPassword, setConfirmPassword] = useState("");
  const [error, setError] = useState("");
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();

  const handleSignup = async (e) => {
    e.preventDefault();
    setError("");

    if (password !== confirmPassword) {
      setError("كلمتا المرور غير متطابقتين");
      return;
    }

    setLoading(true);

    try {
      const response = await axios.post("http://localhost:8000/api/register", {
        name,
        email,
        password,
        password_confirmation: confirmPassword,
      });

        const { token, user } = response.data;

     
        localStorage.setItem('token', token);
        localStorage.setItem('user', JSON.stringify(user));

        // ضبط الهيدر لكل طلبات axios المستقبلية
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

      navigate("/profile"); // أو أي صفحة أخرى
    } catch (err) {
      if (err.response?.data?.errors) {
        const firstError = Object.values(err.response.data.errors)[0][0];
        setError(firstError);
      } else if (err.message) {
        setError("حدث خطأ: " + err.message);
      } else {
        setError("فشل التسجيل. تحقق من البيانات أو جرب لاحقاً.");
      }
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="signup-page">
      <h2>إنشاء حساب جديد</h2>
      <form onSubmit={handleSignup}>
        <input
          type="text"
          placeholder="الاسم الكامل"
          value={name}
          onChange={(e) => setName(e.target.value)}
          required
        />
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
        <input
          type="password"
          placeholder="تأكيد كلمة المرور"
          value={confirmPassword}
          onChange={(e) => setConfirmPassword(e.target.value)}
          required
        />
        <button type="submit" disabled={loading}>
          {loading ? "...جاري التسجيل" : "تسجيل"}
        </button>
      </form>
      {error && <p className="error">{error}</p>}
    </div>
  );
}
