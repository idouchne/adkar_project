import './Footer.css';

export default function Footer({ darkMode }) {
  return (
    <footer className={`site-footer ${darkMode ? 'dark' : ''}`}>
      <p>
        نور الامان هو موقع ديني يقدم مجموعة من الأذكار والأدعية النبوية والقرآنية
        اليومية لتقوية الإيمان وجلب الطمأنينة.
      </p>
      <nav>
        <a href="/">الصفحة الرئيسية</a> | <a href="/adkar">الأذكار</a> |{' '}
        <a href="/dua">الأدعية</a> | <a href="/about">حول الموقع</a>
      </nav>
      <p>© 2025 Noor Al-Imane. All rights reserved.</p>
      <p>صُنع بحُب لأمة الإسلام ❤️</p>
    </footer>
  );
}
