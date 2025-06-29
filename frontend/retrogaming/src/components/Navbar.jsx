import { Link } from "react-router-dom";

function Navbar() {
    return (
        <nav className="navbar navbar-dark bg-dark">
            <div className="container">
                <Link to="/" className="navbar-brand">
                    RetroGaming
                </Link>
                <Link to="/videogame" className="navbar-brand"> videogames</Link>
            </div>
        </nav>
    );
}

export default Navbar;