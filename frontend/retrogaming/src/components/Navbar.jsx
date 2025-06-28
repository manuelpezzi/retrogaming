import { Link } from "react-router-dom";

function Navbar() {
    return (
        <nav className="navbar navbar-dark bg-dark">
            <div className="container">
                <Link rel="stylesheet" href="" to="/" className="navbar-brand">
                    RetroGaming
                </Link>
                <Link rel="stylesheet" href="" to="/videogame" className="navbar-brand"> videogames</Link>
            </div>
        </nav>
    );
}

export default Navbar;