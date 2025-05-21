// App.jsx أو أينما تعرف مساراتك
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import HomePage from './pages/HomePage';
import LoginPage from './pages/LoginPage';
import SignupPage from './pages/SignupPage';
import AdkarPage from './pages/AdkarPage';
import DuaPage from './pages/DuaPage';
import CategoriesPage from './pages/CategoriesPage';
import ProfilePage from './pages/ProfilePage';
import ProtectedRoute from './components/ProtectedRoute';

function App() {
  return (
    
      <Routes>
        {/* صفحات عامة */}
        <Route path="/" element={<HomePage />} />
        <Route path="/login" element={<LoginPage />} />
        <Route path="/signup" element={<SignupPage />} />

        {/* صفحات محمية */}
        <Route
          path="/adkar"
          element={
            <ProtectedRoute>
              <AdkarPage />
            </ProtectedRoute>
          }
        />
         <Route
          path="/dua"
          element={
            <ProtectedRoute>
              <DuaPage />
            </ProtectedRoute>
          }
        />

        <Route
          path="/categories"
          element={
            <ProtectedRoute>
              <CategoriesPage />
            </ProtectedRoute>
          }
        />

        <Route
          path="/profile"
          element={
            <ProtectedRoute>
              <ProfilePage />
            </ProtectedRoute>
          }
        />
      </Routes>
     
  );
}

export default App;
