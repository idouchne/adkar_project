import React, { useState } from 'react';
import './HomePage.css';
import Header from '../components/Header';
import Footer from '../components/Footer';

const categories = [
  'أذكار الصباح',
  'أذكار المساء',
  'أذكار النوم',
  'أذكار الصلاة',
  'أذكار عامة',
];

const sampleAdkar = [
  {
    id: 1,
    title: 'ذكر بعد الصلاة',
    source: 'صحيح مسلم',
    text: 'سبحان الله',
    repeat: 33,
    explanation: 'هذا الذكر يُقال بعد الصلوات المفروضة وهو من التسبيح المشروع.',
  },
  {
    id: 2,
    title: 'ذكر الصباح',
    source: 'الأذكار النبوية',
    text: 'الحمد لله',
    repeat: 33,
    explanation: 'من أذكار الصباح التي تقوي الصلة بالله وتشعر بالطمأنينة.',
  },
];

export default function HomePage() {
  const [search, setSearch] = useState('');
  const [expandedId, setExpandedId] = useState(null);

  const toggleDetails = (id) => {
    setExpandedId((prevId) => (prevId === id ? null : id));
  };

  const filteredAdkar = sampleAdkar.filter(
    (adk) =>
      adk.text.includes(search) ||
      adk.title.includes(search) ||
      adk.source.includes(search)
  );

  return (
    <>
      <Header />
      <div className="container">
        <header>
          <h1>Daily Islamic Adkar</h1>
          <blockquote>
            "أَلَا بِذِكْرِ اللَّهِ تَطْمَئِنُّ الْقُلُوبُ" <br /> (سورة الرعد 13:28)
          </blockquote>
          <div className="buttons">
            <button onClick={() => (window.location.href = '/adkar')}>
              Explore Adkar
            </button>
            <button onClick={() => (window.location.href = '/categories')}>
              Learn More
            </button>
          </div>
        </header>

        <section className="search-section">
          <input
            type="text"
            placeholder="ابحث عن الذكر أو الدعاء..."
            value={search}
            onChange={(e) => setSearch(e.target.value)}
          />
        </section>

        <section className="categories">
          <h2>التصنيفات</h2>
          <div className="category-buttons">
            {categories.map((cat) => (
              <button key={cat}>{cat}</button>
            ))}
          </div>
        </section>

        <section className="adkar-list">
          <h2>الأذكار اليومية</h2>
          <div className="cards">
            {filteredAdkar.map((adk) => (
              <div key={adk.id} className="card">
                <h3>{adk.title}</h3>
                <p className="source">{adk.source}</p>
                <p className="text">{adk.text}</p>
                <p className="repeat">التكرار: {adk.repeat} مرة</p>
                <button className="show-more" onClick={() => toggleDetails(adk.id)}>
                  {expandedId === adk.id ? 'Show Less' : 'Show More'}
                </button>
                <div className={`details ${expandedId === adk.id ? 'expanded' : ''}`}>
                  <p>{adk.explanation}</p>
                </div>
              </div>
            ))}
            {filteredAdkar.length === 0 && <p>لا توجد نتائج للبحث</p>}
          </div>
        </section>
      </div>
      <Footer />
    </>
  );
}
