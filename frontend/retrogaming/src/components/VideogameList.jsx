import { useState, useEffect } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';

function VideogameList() {
    const [videogames, setVideogames] = useState([]);
    const [error, setError] = useState(null);

    useEffect(() => {
        axios
            .get('http://localhost:8000/api/videogames')
            .then((response) => {
                if (response.data.success) {
                    setVideogames(response.data.data);
                } else {
                    setError('Failed to load videogames');
                }
            })
            .catch((error) => {
                setError('Error fetching videogames: ' + error.message);
            });
    }, []);

    if (error) return <div className="alert alert-danger">{error}</div>;

    return (
        <div className='main-page'>
            <h1>Videogames</h1>
            <div className="row row-gap-3">
                {videogames.map((videogame) => (
                    <div key={videogame.id} className="col-md-6 mb-6">
                        <div className="card bg-dark text-white">
                            {videogame.copertina ? (
                                <img
                                    src={`http://localhost:8000/storage/${videogame.copertina}`}
                                    className="card-img-top"
                                    alt={videogame.titolo}
                                    style={{ height: '450px', objectFit: 'contain' }}
                                />
                            ) : (
                                <div
                                    className="card-img-fluid bg-secondary text-center"
                                    style={{ height: '150px', lineHeight: '150px' }}
                                >
                                    No Cover
                                </div>
                            )}
                            <div className="card-body">
                                <h5>{videogame.titolo}</h5>
                                <p>Year: {videogame.anno}</p>
                                <p>
                                    {videogame.genres && videogame.genres.map((genre) => (
                                        <span
                                            key={genre.id}
                                            className="badge"
                                            style={{ backgroundColor: genre.color }}
                                        >
                                            {genre.name}
                                        </span>
                                    ))}
                                </p>
                                {videogame.id ? (
                                    <Link
                                        to={`/videogame/${videogame.id}`}
                                        className="btn btn-primary btn-sm"
                                    >
                                        Details
                                    </Link>
                                ) : (
                                    <span className="btn btn-secondary btn-sm disabled">No Details</span>
                                )}
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
}

export default VideogameList;