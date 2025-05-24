import React, { useState } from 'react';
import Header from '../components/Header';
import Footer from '../components/Footer';
import './AdkarPage.css';

const sampleAdkar = [
  {
    id: 1,
    title: 'ذكر الصباح',
    text: 'اللهم بك أصبحنا وبك أمسينا...',
    repeat: 3,
    category: 'الصباح',
    explanation: 'من أذكار الصباح التي تريح القلب وتزيد الطمأنينة.',
  },
  {
    id: 2,
    title: 'ذكر بعد الصلاة',
    text: 'سبحان الله',
    repeat: 33,
    category: 'بعد الصلاة',
    explanation: 'تقال بعد كل صلاة مفروضة.',
  },
];

export default function AdkarPage() {
  const [repeats, setRepeats] = useState({});
  const [likes, setLikes] = useState({});
  const [categoryFilter, setCategoryFilter] = useState('الكل');
  const [darkMode, setDarkMode] = useState(false);

  const playBeep = () => {
    const audio = new Audio('/beep.mp3');
    audio.play();
  };

  const handleRepeat = (id, limit) => {
    setRepeats((prev) => {
      const newCount = (prev[id] || 0) + 1;
      if (newCount <= limit) playBeep();
      return { ...prev, [id]: newCount > limit ? limit : newCount };
    });
  };

  const handleCopy = (text) => {
    navigator.clipboard.writeText(text);
    alert('تم نسخ الذكر!');
  };

  const toggleLike = (id) => {
    setLikes((prev) => ({ ...prev, [id]: !prev[id] }));
  };

  const filtered = categoryFilter === 'الكل'
    ? sampleAdkar
    : sampleAdkar.filter((a) => a.category === categoryFilter);

  return (
    <>
      <Header darkMode={darkMode} />
      <div className={`adkar-page ${darkMode ? 'dark' : ''}`}>
        <div className="controls">
          <select onChange={(e) => setCategoryFilter(e.target.value)}>
            <option value="الكل">كل الأذكار</option>
            <option value="الصباح">الصباح</option>
            <option value="بعد الصلاة">بعد الصلاة</option>
          </select>
          <button onClick={() => setDarkMode(!darkMode)}>
            {darkMode ? 'وضع النهار ☀️' : 'الوضع الليلي 🌙'}
          </button>
        </div>

        <div className="adkar-list">
          {filtered.map((adk) => (
            <div key={adk.id} className="adkar-card">
              <h3>
                {adk.title}
                <span className="badge">{adk.category}</span>
              </h3>
              <p className="text">{adk.text}</p>
              <p className="explanation">{adk.explanation}</p>

              <div className="actions">
                <button onClick={() => handleRepeat(adk.id, adk.repeat)}>
                  {repeats[adk.id] || 0}/{adk.repeat}
                </button>
                <button onClick={() => handleCopy(adk.text)}>📋 نسخ</button>
                <button onClick={() => toggleLike(adk.id)}>
                  {likes[adk.id] ? '❤️' : '🤍'}
                </button>
              </div>

              <progress
                value={repeats[adk.id] || 0}
                max={adk.repeat}
                className="progress-bar"
              />
            </div>
          ))}
        </div>
      </div>
      <Footer darkMode={darkMode} />

    </>
  );
}
