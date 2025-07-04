import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Navbar from './components/Navbar.jsx';
import VideogameList from './components/VideogameList.jsx';
import VideogameDetail from './components/VideogameDetail.jsx';
import './App.css';
import HomePage from './components/homepage.jsx';

function App() {
  return (
    <Router>
      <div className="App">
        <Navbar />
        <div className="container mt-3 min">
          <Routes>
            <Route path='/' element={<HomePage />} />
            <Route path="/videogame" element={<VideogameList />} />
            <Route path="/videogame/:id" element={<VideogameDetail />} />
          </Routes>
        </div>
      </div>
    </Router>
  );
}

export default App;
