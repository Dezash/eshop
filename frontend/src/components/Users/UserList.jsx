import React from 'react'
import { List, ListItem, ListItemText } from '@material-ui/core';
import UserItem from './UserItem';
import PropTypes from 'prop-types';

const UserList = ({ users }) => {
    return (
        <div>
            <List
                subheader={(
                    <ListItem>
                        <ListItemText
                            disableTypography
                            primary="Name"
                        />
                        <ListItemText
                            disableTypography
                            primary="Email"
                        />
                        <ListItemText
                            disableTypography
                            primary="Actions"
                        />
                    </ListItem>
                )}
            >
                {users &&
                    users.length !== 0 &&
                    Object.values(users).map((user) => (
                        <UserItem user={user} key={user.id} />
                    ))}
            </List>
        </div>
    )
}

UserList.propTypes = {
    users: PropTypes.instanceOf(Object),
};

UserList.defaultProps = {
    users: [],
};

export default UserList;
