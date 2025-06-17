import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Navbar from './components/navbar';
import VideogameList from './components/VideogameList';
import VideogameDetail from './components/VideogameDetail';

function App() {


  return (
    <Router>
      <div className="app">
        <Navbar />
        <div className="container mt-3">
          <Routes>
            <Route path='/' element={<VideogameList />} />
            <Route path='/videogame/:id' element={<VideogameDetail
            />} />

          </Routes>
        </div>
      </div>
    </Router>


  )
}

export default App
