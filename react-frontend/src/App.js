import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';
import Mainpage from './Role-Selection/Mainpage';
import Login from './Student-Role/Login';
import Signup from './Student-Role/Signup';
import StudentDashboard from './Student-Role/StudentDashboard';
import TutorLogin from './Tutor-Role/TutorLogin';
import TutorSignup from './Tutor-Role/TutorSignup';
import TutorDashboard from './Tutor-Role/TutorDashboard';
import StudentSelectTutors from './Student-Role/StudentSelectTutors';
import TutorRequest from './Tutor-Role/TutorRequest';
import StudentTutorPending from './Student-Role/StudentTutorPending';
import TutorSchedule from './Tutor-Role/TutorSchedule';
import StudentSched from './Student-Role/StudentSched';

function NotFound() {
    return (
        <div style={{ padding: '2rem', textAlign: 'center' }}>
            <h1>404 - Page Not Found</h1>
            <p>The page you are looking for could not be found.</p>
            <a href="/" style={{ color: '#007bff', textDecoration: 'underline' }}>Go to Home</a>
        </div>
    );
}

function App() {
    return (
      <Router>
        <div className="App">
          <Routes>
            <Route path="/" element={<Mainpage />} />
            <Route path="/login" element={<Login />} />
            <Route path="/signup" element={<Signup />} />
            <Route path="/student-dashboard" element={<StudentDashboard />} />
            <Route path="/tutor-login" element={<TutorLogin />}  />
            <Route path="/tutor-signup" element={<TutorSignup />} />
            <Route path="/tutor-dashboard" element={<TutorDashboard />} />
            <Route path="/student-select-tutors" element={<StudentSelectTutors />} />
            <Route path="/tutor-request" element={<TutorRequest />} />
            <Route path="/student-tutor-pending" element={<StudentTutorPending />} />
            <Route path="/tutor-schedule" element={<TutorSchedule />} />
            <Route path='/student-schedule' element={<StudentSched />} />
            <Route path="*" element={<NotFound />} />
          </Routes>
        </div>
      </Router>
    );
}

export default App;
