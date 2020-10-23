import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  'import': 'url("https://fonts.googleapis.com/css?family=Raleway:300,400,600")',
  'form-label': {
    'fontSize': [{ 'unit': 'px', 'value': 30 }],
    'color': '#444'
  },
  't-wrapper': {
    'padding': [{ 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 30 }, { 'unit': 'px', 'value': 0 }, { 'unit': 'px', 'value': 30 }]
  },
  'p-textbox': {
    'width': [{ 'unit': '%H', 'value': 1 }],
    'background': '#f2f2f2',
    'border': [{ 'unit': 'px', 'value': 0 }],
    'padding': [{ 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }, { 'unit': 'px', 'value': 15 }],
    'fontSize': [{ 'unit': 'px', 'value': 16 }]
  },
  'p-textboxp-content': {
    'height': [{ 'unit': 'px', 'value': 300 }]
  },
  'help-block': {
    'color': 'red !important'
  },
  'block-with-text p': {
    'overflow': 'hidden',
    'display': '-webkit-box',
    'WebkitLineClamp': '3',
    'WebkitBoxOrient': 'vertical'
  },
  'author': {
    'fontStyle': 'italic',
    'fontSize': [{ 'unit': 'px', 'value': 12 }]
  },
  'thumbnail': {
    'height': [{ 'unit': 'px', 'value': 200 }],
    'marginBottom': [{ 'unit': 'px', 'value': 10 }]
  },
  'label': {
    'fontSize': [{ 'unit': 'px', 'value': 10 }],
    'backgroundColor': 'brown',
    'color': 'white',
    'padding': [{ 'unit': 'px', 'value': 5 }, { 'unit': 'px', 'value': 5 }, { 'unit': 'px', 'value': 5 }, { 'unit': 'px', 'value': 5 }],
    'borderRadius': '4px'
  },
  'avatar': {
    'height': [{ 'unit': 'px', 'value': 200 }]
  },
  'name': {
    'fontStyle': 'normal',
    'fontFamily': ''Raleway', sans-serif',
    'fontWeight': 'bold'
  },
  'position': {
    'fontSize': [{ 'unit': 'px', 'value': 12 }],
    'fontWeight': 'bold'
  },
  'surname': {
    'color': 'gold'
  }
});
