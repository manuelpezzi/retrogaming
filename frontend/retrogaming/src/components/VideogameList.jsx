import { useState, useEffect } from "react";
import axios from 'axios';
import { Link } from "react-router-dom";


function VideogameList() {
    const [videogames, setVideogames] = useState([]);

    useEffect(() => {
        axios
            .get('http://localhost:8000/api/videogames')
            .then((response) => {
                if (response.data.success) {
                    setVideogames(response.data.data);
                }
            })
            .catch((error) => {
                console.error('Error fetching videogames:', error);
            });
    }, []);
    return (
        <div>
            <h1>Videogames</h1>
            <div className="row">
                {videogames.map((videogame) => (
                    <div key={videogame.id} className="col-md-4 mb-3">
                        <div className="card bg-dark text-white">
                            {videogame.copertina ? (
                                <img
                                    src={`http://localhost:8000/storage/${videogame.copertina}`}
                                    className="card-img-top"
                                    alt={videogame.titolo}
                                    style={{ height: '150px', objectFit: 'cover' }}
                                />
                            ) : (
                                <div
                                    className="card-img-top bg-secondary text-center"
                                    style={{ height: '150px', lineHeight: '150px' }}
                                >
                                    No Cover
                                </div>
                            )}
                            <div className="card-body">
                                <h5>{videogame.titolo}</h5>
                                <p>Year: {videogame.anno}</p>
                                <p>
                                    {videogame.genres.map((genre) => (
                                        <span
                                            key={genre.id}
                                            className="badge"
                                            style={{ backgroundColor: genre.color }}
                                        >
                                            {genre.name}
                                        </span>
                                    ))}
                                </p>
                                <Link
                                    to={`/videogame/${videogame.id}`}
                                    className="btn btn-primary btn-sm"
                                >
                                    Details
                                </Link>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
}
export default VideogameList;
