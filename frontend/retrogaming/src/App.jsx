import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Navbar from './components/navbar.jsx';
import VideogameList from './components/VideogameList.jsx';
import VideogameDetail from './components/VideogameDetail.jsx';
import './App.css';

function App() {
  return (
    <Router>
      <div className="App">
        <Navbar />
        <div className="container mt-3 min">
          <Routes>
            <Route path="/" element={<VideogameList />} />
            <Route path="/videogame/:id" element={<VideogameDetail />} />
          </Routes>
        </div>
      </div>
    </Router>
  );
}

export default App;
