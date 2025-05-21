import { Link, useNavigate } from 'react-router-dom';
import './Header.css';

export default function Header() {
  const navigate = useNavigate();
  const token = localStorage.getItem('token');
  const user = JSON.parse(localStorage.getItem('user'));

  const handleLogout = () => {
    localStorage.removeItem('token');
    localStorage.removeItem('user');
    navigate('/login');
  };

  return (
    <header className="site-header">
      <div className="logo">
        <Link to="/">نور الأمان</Link>
      </div>

      <nav>
        <Link to="/adkar">الأذكار</Link>
        <Link to="/dua">الأدعية</Link>
        <Link to="/categories">التصنيفات</Link>

        {token ? (
          <>
            <Link to="/profile">الملف الشخصي</Link>
            <button onClick={handleLogout} className="logout-button">تسجيل الخروج</button>
          </>
        ) : (
          <>
            <Link to="/login">تسجيل الدخول</Link>
            <Link to="/signup">إنشاء حساب</Link>
          </>
        )}
      </nav>
    </header>
  );
}
