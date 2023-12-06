import React, { useState, useEffect } from 'react';
import axios from 'axios';

const AdminPanel = () => {
  const [users, setUsers] = useState([]);
  const [newUser, setNewUser] = useState({
    name: '',
    email: '',
    password: '',
  });
  const [editingUserId, setEditingUserId] = useState(null);
  const [editingUser, setEditingUser] = useState({
    name: '',
    email: '',
    password: '',
  });

  useEffect(() => {
    const fetchUsers = async () => {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/users');
        setUsers(response.data);
      } catch (error) {
        console.error('Błąd podczas pobierania danych:', error);
      }
    };

    fetchUsers();
  }, []);

  const handleAddUser = async () => {
    try {
      const response = await axios.post('http://127.0.0.1:8000/api/users', newUser);
      setUsers([...users, response.data]);
      setNewUser({
        name: '',
        email: '',
        password: '',
      });
    } catch (error) {
      console.error('Błąd podczas dodawania użytkownika:', error);
    }
  };

  const handleEditUser = async () => {
    try {
      const response = await axios.put(`http://127.0.0.1:8000/api/users/${editingUserId}`, editingUser);
      const updatedUsers = users.map((user) =>
        user.id === editingUserId ? response.data : user
      );
      setUsers(updatedUsers);
      setEditingUserId(null);
      setEditingUser({
        name: '',
        email: '',
        password: '',
      });
    } catch (error) {
      console.error('Błąd podczas edycji użytkownika:', error);
    }
  };

  const handleDeleteUser = async (userId) => {
    try {
      await axios.delete(`http://127.0.0.1:8000/api/users/${userId}`);
      const updatedUsers = users.filter((user) => user.id !== userId);
      setUsers(updatedUsers);
    } catch (error) {
      console.error('Błąd podczas usuwania użytkownika:', error);
    }
  };

  return (
    <div>
      <h1>Lista użytkowników</h1>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Email</th>
            <th>Akcje</th>
          </tr>
        </thead>
        <tbody>
          {users.map((user) => (
            <tr key={user.id}>
              <td>{user.id}</td>
              <td>{user.name}</td>
              <td>{user.email}</td>
              <td>
                <button onClick={() => setEditingUserId(user.id)}>Edytuj</button>
                <button onClick={() => handleDeleteUser(user.id)}>Usuń</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      {/* Formularz do dodawania użytkownika */}
      <div>
        <h2>Dodaj użytkownika</h2>
        <label>
          Imię:
          <input
            type="text"
            value={newUser.name}
            onChange={(e) => setNewUser({ ...newUser, name: e.target.value })}
          />
        </label>
        <label>
          Email:
          <input
            type="email"
            value={newUser.email}
            onChange={(e) => setNewUser({ ...newUser, email: e.target.value })}
          />
        </label>
        <label>
          Hasło:
          <input
            type="password"
            value={newUser.password}
            onChange={(e) => setNewUser({ ...newUser, password: e.target.value })}
          />
        </label>
        <button onClick={handleAddUser}>Dodaj użytkownika</button>
      </div>

      {/* Formularz do edycji użytkownika */}
      {editingUserId && (
        <div>
          <h2>Edytuj użytkownika</h2>
          <label>
            Imię:
            <input
              type="text"
              value={editingUser.name}
              onChange={(e) => setEditingUser({ ...editingUser, name: e.target.value })}
            />
          </label>
          <label>
            Email:
            <input
              type="email"
              value={editingUser.email}
              onChange={(e) => setEditingUser({ ...editingUser, email: e.target.value })}
            />
          </label>
          <label>
            Hasło:
            <input
              type="password"
              value={editingUser.password}
              onChange={(e) => setEditingUser({ ...editingUser, password: e.target.value })}
            />
          </label>
          <button onClick={handleEditUser}>Zapisz zmiany</button>
        </div>
      )}
    </div>
  );
};

export default AdminPanel;
