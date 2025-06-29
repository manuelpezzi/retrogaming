import { Link } from "react-router-dom";

function HomePage() {
    return (
        <div className="container">
            <div className="gaming">
                <h1 className="title">RetroGaming</h1>
                <Link to="/videogame" className="retro-button">Press Start</Link>
            </div>
        </div>
    );
}
export default HomePage;